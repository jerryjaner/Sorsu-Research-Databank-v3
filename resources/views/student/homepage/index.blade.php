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
                    <input
                        type="number"
                        class="form-control form-control-solid"
                        name="completion_year"
                        placeholder="Year (e.g. 2026)"
                        min="1900"
                        max="2099"
                    >
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
                    html = `
                    <div class="col-12 d-flex justify-content-center mt-5">
                        <div class="card border-0 shadow-sm text-center p-5"
                            style="max-width: 700px; border-radius: 18px;">
                            <div class="card-body">
                                <i class="fas fa-search fa-3x text-primary mb-3"></i>
                                <h3 class="fw-bold mb-2">No Results Found</h3>
                                <p class="text-muted mb-0">
                                    Try adjusting your filters or search keywords.
                                </p>
                            </div>
                        </div>
                    </div>`;
                } else {

                    res.data.forEach(function(item) {
                        html += `
                        <div class="col-12 mb-4">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 16px;">

                                <div class="card-body p-4">

                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h4 class="fw-bold text-primary mb-0">
                                            ${item.title ?? 'Untitled Research'}
                                        </h4>

                                        ${item.abstract_path
                                            ? (isLoggedIn
                                                ? `<a href="/research/download/${item.id}"
                                                    class="btn btn-sm btn-danger rounded-pill px-3">
                                                    <i class="fas fa-file-pdf me-1"></i> Download
                                                </a>`
                                                : `<span class="badge bg-danger-subtle text-danger px-3 py-2">
                                                    Login to download
                                                </span>`)
                                            : `<span class="text-muted small"><em>No Abstract</em></span>`}
                                    </div>

                                    <!-- Author & Year -->
                                    <div class="mb-2 text-muted small d-flex align-items-center gap-2">
                                        <span><strong>Author's:</strong> ${item.author ?? 'N/A'}</span>
                                        <span>•</span>
                                        <span><strong>Year:</strong> ${item.completion_year ?? 'N/A'}</span>
                                    </div>

                                    <!-- Keywords with copy button -->
                                    <div class="mb-3 d-flex align-items-center gap-2 position-relative">
                                        <span class="text-muted" id="keywords-${item.id}">
                                            ${item.keywords ? item.keywords : 'No keywords available.'}
                                        </span>
                                        <button class="btn btn-sm btn-outline-secondary copy-keywords" data-target="#keywords-${item.id}" title="Copy Keywords">
                                            <i class="fas fa-copy"></i>
                                        </button>

                                        <!-- Copy feedback (hidden, will show near button) -->
                                        <span class="copy-feedback position-absolute text-success small fw-bold" style="top:-20px; right:0; display:none;">
                                            Copied!
                                        </span>
                                    </div>

                                    <!-- Publication & Campus badges -->
                                    <div class="d-flex flex-wrap gap-2">
                                        ${item.publication
                                            ? `<span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                                ${item.publication}
                                            </span>`
                                            : ''}

                                        ${item.campus
                                            ? `<span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                                ${item.campus.name}
                                            </span>`
                                            : ''}
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
                            html += `
                            <li class="page-item ${i === res.current_page ? 'active' : ''}">
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

    // Submit form
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        fetchResearch();
    });

    // Live search (title)
    $('input[name="title"]').on('keyup', function() {
        fetchResearch();
    });

    // Live search (year)
    $('input[name="completion_year"]').on('keyup', function() {
        fetchResearch();
    });

    // Campus filter
    $('#campus-select').on('change', function() {
        fetchResearch();
    });

    // Reset
    $('#reset-btn').on('click', function() {
        $('#filter-form')[0].reset();
        fetchResearch();
    });

    // Pagination
    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        if (page) fetchResearch(page);
    });

    // Copy keywords to clipboard with feedback near button
    $(document).on('click', '.copy-keywords', function() {
        const target = $(this).data('target');
        const text = $(target).text().trim();
        const $feedback = $(this).siblings('.copy-feedback');

        if (!text) return;

        navigator.clipboard.writeText(text).then(() => {
            $feedback.fadeIn(150).delay(800).fadeOut(150);
        }).catch(err => console.error('Failed to copy: ', err));
    });

    // Initial fetch
    fetchResearch();

});
</script>
@endpush
@endsection
