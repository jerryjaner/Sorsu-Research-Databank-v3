@extends('layouts.student')
@section('title', 'Home Page')

@section('content')
    <!-- Toolbar -->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <div class="page-title d-flex flex-column">
                <h1 class="d-flex text-white fw-bold fs-2qx my-1 me-5">Research Repository</h1>
                <span class="text-white opacity-75 pt-1">Discover and explore academic research</span>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">

            <!-- Filter Form -->
            <div class="d-flex justify-content-center mb-4 w-100">
                <form id="filter-form" class="row g-3 align-items-center w-100">

                    <div class="col-12 col-md-4">
                        <input type="text" class="form-control form-control-solid" name="title" placeholder="Search">
                    </div>

                    <div class="col-12 col-md-3">
                        <select class="form-select form-select-solid" name="campus_id" id="campus-select">
                            <option value="">Select Campus</option>
                            @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <select class="form-select form-select-solid" name="department_id" id="department-select">
                            <option value="">Select College</option>
                        </select>
                    </div>

                    <div class="col-6 col-md-1">
                        <button type="button" id="reset-btn" class="btn btn-secondary w-100">
                            <i class="fas fa-redo"></i>
                        </button>
                    </div>

                    <div class="col-6 col-md-1">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </form>
            </div>

            <!-- Research Results -->
            <div class="row mt-5" id="research-results">
                <!-- Placeholder / Results injected via JS -->
            </div>

        </div>
    </div>

    {{-- Pass auth info to JS --}}
    <script>
        var isLoggedIn = @json(Auth::check());
    </script>

    @push('script')
    <script>
        $(document).ready(function() {

            function fetchResearch(page = 1) {
                let formData = $('#filter-form').serialize();
                $.ajax({
                    url: "{{ route('search') }}?page=" + page,
                    type: "GET",
                    data: formData,
                    success: function(res) {
                        let html = '';

                        if (!res.data || res.data.length === 0) {
                            // Full-width placeholder card
                            html = `<div class="col-12 d-flex justify-content-center mt-5">
                                <div class="card text-center shadow-sm p-5" style="width: 100%; max-width: 1000px; border-radius: 15px;">
                                    <div class="card-body">
                                        <i class="fas fa-search fa-3x text-primary mb-3"></i>
                                        <h4 class="card-title mb-2">Start Searching</h4>
                                        <p class="card-text text-muted">
                                            Use the search box or filters above to find research papers in the repository.
                                        </p>
                                    </div>
                                </div>
                            </div>`;
                        } else {
                            // Render research results
                            res.data.forEach(function(item) {
                                html += `
                                <div class="col-12 mb-4">
                                    <div class="card shadow-sm border-0 rounded-3 h-100">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h4 class="card-title mb-0 text-primary">${item.title}</h4>
                                                ${item.abstract_path
                                                    ? (isLoggedIn
                                                        ? `<a href="/research/download/${item.id}" class="btn btn-sm btn-danger">
                                                             <i class="fas fa-file-pdf"></i> Download
                                                           </a>`
                                                        : `<span class="badge bg-danger">Login to download research absract</span>`)
                                                    : `<span class="text-muted"><em>No Abstract</em></span>`}
                                            </div>
                                            <p class="mb-1"><strong>Author:</strong> ${item.author}</p>
                                            <p class="mb-1"><strong>Year:</strong> ${item.academic_year ?? 'N/A'}</p>
                                            <p class="mb-2" style="text-align: justify;">${item.description ?? 'No description available.'}</p>
                                            <div class="d-flex gap-2 flex-wrap">
                                                ${item.publication ? `<span class="badge bg-primary">Publication: ${item.publication}</span>` : ''}
                                                ${item.department ? `<span class="badge bg-warning">College: ${item.department.name}</span>` : ''}
                                                ${item.campus ? `<span class="badge bg-success">${item.campus.name}</span>` : ''}
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            });

                            // Pagination
                            if (res.last_page > 1) {
                                html += `<div class="col-12 d-flex justify-content-center mt-4">
                                    <ul class="pagination">`;
                                for (let i = 1; i <= res.last_page; i++) {
                                    html += `<li class="page-item ${i === res.current_page ? 'active' : ''}">
                                        <a href="#" class="page-link" data-page="${i}">${i}</a>
                                    </li>`;
                                }
                                html += `</ul></div>`;
                            }
                        }

                        $('#research-results').html(html);
                    }
                });
            }

            // Form submit
            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                fetchResearch();
            });

            // Live search
            $('input[name="title"]').on('keyup', function() {
                fetchResearch();
            });

            // Reset button
            $('#reset-btn').on('click', function() {
                $('#filter-form')[0].reset();
                $('#department-select').html('<option value="">Select College</option>');
                fetchResearch();
            });

            // Department change
            $('#department-select').on('change', fetchResearch);

            // Campus change → load departments first
            $('#campus-select').on('change', function() {
                let campusId = $(this).val();
                $('#department-select').html('<option>Loading...</option>');

                if (campusId) {
                    $.get('/departments/' + campusId, function(data) {
                        let options = '<option value="">Select College</option>';
                        data.forEach(function(dept) {
                            options += `<option value="${dept.id}">${dept.name}</option>`;
                        });
                        $('#department-select').html(options);

                        // Fetch research after departments are loaded
                        fetchResearch();
                    });
                } else {
                    $('#department-select').html('<option value="">Select College</option>');
                    fetchResearch();
                }
            });

            // Initial load: show placeholder
            fetchResearch();

            // Handle pagination clicks
            $(document).on('click', '.pagination .page-link', function(e) {
                e.preventDefault();
                let page = $(this).data('page');
                if (page) fetchResearch(page);
            });

        });
    </script>
    @endpush
@endsection
