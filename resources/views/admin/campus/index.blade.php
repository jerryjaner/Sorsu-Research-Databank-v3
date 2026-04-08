@extends('layouts.admin')
@section('title', 'Role Management')

@section('page-title', 'Campus Management')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('homepage') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">Campus</li>
@endsection
@section('content')

    <div class="container" id="kt_content_container">

        <div class="row g-xl-8">

            <!-- Create / Edit Form -->
            <div class="col-xxl-5">
                <div class="card card-flush mb-5 mb-xl-8">
                    <div class="card-header mt-5">
                        <div class="alert alert-primary d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Create a New Campus</h5>
                                <p class="mb-0 text-muted">
                                    Please complete all required fields below to add a new campus to the system. Make sure
                                    the campus name is unique and accurate.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-1">
                        <form id="CampusForm" method="POST">
                            @csrf
                            <input type="hidden" id="campus_id" name="campus_id">

                            <div class="mb-7">
                                <label class="form-label fw-bold">Campus Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="campus_name"
                                    class="form-control form-control-solid" placeholder="Enter campus name">
                                <span class="text-danger error-text name_error"></span>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary btn-sm float-end" id="campus_save_button">Save
                                    Campus</button>
                                <button type="button" class="btn btn-warning btn-sm float-end me-2"
                                    id="campus_cancel_button" style="display:none">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Roles Table -->
            <div class="col-xxl-7">
                <div class="card card-xxl-stretch mb-5 mb-xl-3">
                    <div class="card-header border-0 pt-5 pb-3">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-boldest text-gray-800 fs-2">Campus Management</span>
                            <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your campuses</span>
                        </h3>
                        <div class="card-toolbar">
                            <!-- Search -->
                            <div class="position-relative pe-6 my-1">
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <!-- SVG icon here -->
                                </span>
                                <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10"
                                    name="search" id="search-campus" placeholder="Search" />
                            </div>
                            <!-- Filter -->
                            {{-- <div class="my-1">
                            <a class="btn btn-sm btn-icon btn-circle btn-icon-success btn-active-light-success" href="#" data-bs-toggle="modal" data-bs-target="#createCampusModal">
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add New User">
                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                        </div> --}}
                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div id="all_campuses">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Create Campus Modal -->
    <div class="modal fade" id="createCampusModal" tabindex="-1" aria-labelledby="createCampusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-badge-fill me-2"></i> Create Campus</h5>
                    <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Info -->
                    <div class="alert alert-primary d-flex align-items-start mb-4">
                        <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                        <div>
                            <h5 class="mb-1 fw-bold">Create a New Campus</h5>
                            <p class="mb-0 text-muted">
                                Please complete all required fields below to add a new campus to the system. Make sure the campus name is unique and accurate.
                            </p>
                        </div>
                    </div>


                    <!-- Campus Form -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="campusName" class="form-label">Campus Name</label>
                            <input type="text" class="form-control" id="campusName" placeholder="Enter campus name">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-1"></i> Close
                    </button>
                    <button type="button" id="saveCampusBtn" class="btn btn-primary btn-sm">
                        <span id="saveBtnText"><i class="bi bi-check2-circle me-1"></i> Save changes</span>
                        <span id="saveBtnSpinner" class="spinner-border spinner-border-sm ms-1 d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>

            </div>
        </div>
    </div> --}}

    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {

                //  CSRF
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // GLOBAL 403 HANDLER
                $(document).ajaxError(function(event, xhr) {
                    if (xhr.status === 403) {
                        Swal.fire(
                            'Permission Denied',
                            xhr.responseJSON?.message ||
                            'You do not have permission to perform this action.',
                            'error'
                        );
                    }
                });

                // function GetCampusRecord(search = '') {
                //     $.ajax({
                //         url: '{{ route('admin.campuses.fetch') }}',
                //         method: 'GET',
                //         data: {
                //             search: search
                //         },
                //         success: function(response) {
                //             $("#all_campuses").html(response);

                //             // Initialize DataTable if there is table
                //             if ($("#kt_table_widget_1").length) {
                //                 $("#kt_table_widget_1").DataTable({
                //                     "order": [
                //                         [1, "asc"]
                //                     ],
                //                     "destroy": true, // destroy previous table if exists
                //                     "language": {
                //                         "lengthMenu": "Show _MENU_"
                //                     }
                //                 });
                //             }
                //         },
                //         error: function(xhr) {
                //             Swal.fire('Error', 'Failed to load campuses.', 'error');
                //         }
                //     });
                // }

                function GetCampusRecord(search = '') {
                    // Show skeleton loader first
                    $("#all_campuses").html(`
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered table-row-dashed gy-5 all_campuses_table">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                        <th class="w-20px ps-0"></th>
                                        <th class="min-w-200px px-0">Campus Name</th>
                                        <th class="min-w-125px">Created At</th>
                                        <th class="text-end pe-2 min-w-70px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${Array(5).fill().map(_ => `
                                        <tr>
                                            <td><div class="skeleton skeleton-checkbox"></div></td>
                                            <td><div class="skeleton skeleton-text"></div></td>
                                            <td><div class="skeleton skeleton-text"></div></td>
                                            <td><div class="skeleton skeleton-button"></div></td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    `);

                    $.ajax({
                        url: '{{ route('admin.campuses.fetch') }}',
                        method: 'GET',
                        data: { search: search },
                        success: function(response) {
                            $("#all_campuses").html(response);

                            // Initialize DataTable if table exists
                            if ($("#kt_table_widget_1").length) {
                                $("#kt_table_widget_1").DataTable({
                                    "order": [[1, "asc"]],
                                    "destroy": true,
                                    "language": { "lengthMenu": "Show _MENU_" }
                                });
                            }
                        },
                        error: function(xhr) {
                            $("#all_campuses").html(`
                                <div class="text-center py-5 text-danger">
                                    Failed to load campuses. Please try again.
                                </div>
                            `);
                        }
                    });
                }

                // Initial load
                GetCampusRecord();

                // Live search
                $('#search-campus').on('keyup', function() {
                    let query = $(this).val();
                    GetCampusRecord(query);
                });


                // CREATE / UPDATE
                $('#CampusForm').on('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const id = $('#campus_id').val();

                    let url = "{{ route('admin.campuses.store') }}";
                    let method = "POST";

                    if (id) {
                        url = "/campuses/" + id;
                        method = "POST";
                    }

                    let formData = new FormData(form);
                    if (id) formData.append('_method', 'PUT');

                    $('#campus_save_button')
                        .html('please wait <span class="spinner-border spinner-border-sm ms-2"></span>')
                        .prop('disabled', true);

                    $(form).find('span.error-text').text('');

                    $.ajax({
                        url: url,
                        method: method,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',

                        success: function(response) {

                            if (response.status === 422) {
                                $.each(response.error, function(key, val) {
                                    $(form).find('.' + key + '_error').text(val[0]);
                                });
                            } else {
                                form.reset();
                                $('#campus_id').val('');
                                $('#campus_save_button').text('Save Campus');
                                $('#campus_cancel_button').hide();

                                GetCampusRecord();

                                Swal.fire({
                                    icon: 'success',
                                    title: id ? 'Campus Updated Successfully' :
                                        'Campus Created Successfully',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        },

                        error: function(xhr) {
                            if (xhr.status === 403) {
                                Swal.fire(
                                    'Permission Denied',
                                    xhr.responseJSON?.message || 'You do not have permission.',
                                    'error'
                                );
                            } else if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, val) {
                                    $(form).find('.' + key + '_error').text(val[0]);
                                });
                            } else {
                                Swal.fire('Error', 'Something went wrong. Please try again.',
                                    'error');
                            }
                        },

                        complete: function() {
                            $('#campus_save_button')
                                .text('Save Campus')
                                .prop('disabled', false);
                        }
                    });
                });

                // CANCEL
                $('#campus_cancel_button').on('click', function() {
                    $('#CampusForm')[0].reset();
                    $('#campus_id').val('');
                    $('#campus_save_button').text('Save Campus');
                    $(this).hide();
                });

                // EDIT
                $(document).on('click', '.campus_edit', function() {
                    const id = $(this).data('id');

                    $.get("{{ route('admin.campuses.show', ':id') }}".replace(':id', id))
                        .done(function(response) {
                            $("#campus_id").val(response.id);
                            $("#campus_name").val(response.name);

                            $('#campus_save_button').text("Update Campus");
                            $('#campus_cancel_button').show();
                        })
                        .fail(function(xhr) {
                            if (xhr.status === 403) {
                                Swal.fire('Permission Denied', xhr.responseJSON?.message, 'error');
                            } else {
                                Swal.fire('Error', 'Failed to fetch campus.', 'error');
                            }
                        });
                });

                // DELETE
                $(document).on('click', '.campus_delete', function() {

                    const id = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        if (!result.isConfirmed) return;

                        $.ajax({
                            url: "{{ route('admin.campuses.destroy', ':id') }}".replace(':id',
                                id),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },

                            success: function() {
                                GetCampusRecord();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Campus Deleted Successfully',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            },

                            error: function(xhr) {
                                if (xhr.status === 403) {
                                    Swal.fire(
                                        'Permission Denied',
                                        xhr.responseJSON?.message ||
                                        'You do not have permission.',
                                        'error'
                                    );
                                } else {
                                    Swal.fire('Error', 'Delete failed. Try again.',
                                    'error');
                                }
                            }
                        });
                    });
                });

            });
        </script>
    @endpush


@endsection
