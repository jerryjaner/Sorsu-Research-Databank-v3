@extends('layouts.admin')
@section('title', 'Permission Management')
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
                                    <h5 class="mb-1 fw-bold">Create a New Permission</h5>
                                   <p class="mb-0 text-muted">
                                        Please complete all required fields to add a new permission.
                                        Use the standard naming format <strong>module_action</strong> (e.g.,<code>user_store</code>, <code>user_create</code>,<code>user_update</code>, <code>user_edit</code>,<code>user_view</code>,<code>user_destroy</code>).
                                        Make sure the permission name is unique, descriptive, and matches the feature it will control.
                                    </p>
                            </div>
                      </div>
                    </div>
                    <div class="card-body pt-1">
                        <form id="PermissionForm" method="POST">
                            @csrf
                            <input type="hidden" id="permission_id" name="permission_id">

                            <div class="mb-7">
                                <label class="form-label fw-bold">Permission Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="permission_name" class="form-control form-control-solid"
                                    placeholder="Enter permission name">
                                <span class="text-danger error-text name_error"></span>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary btn-sm float-end" id="permission_save_button">Save
                                    Permission</button>
                                <button type="button" class="btn btn-warning btn-sm float-end me-2" id="permission_cancel_button"
                                    style="display:none">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Permissions Table -->
            <div class="col-xxl-7">
                <div class="card card-xxl-stretch mb-5 mb-xl-3">
                    <div class="card-header border-0 pt-5 pb-3">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-boldest text-gray-800 fs-2">Permission Management</span>
                            <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your permissions</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Search-->
                            <div class="position-relative pe-6 my-1">
                                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10"
                                    name="search"  id="permission_search" placeholder="Search" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div id="all_permissions">
                            {{-- table will be loaded here --}}
                            <div class="text-center py-5">
                                <span class="spinner-border text-primary"></span>
                                <div class="mt-2">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
     <script type="text/javascript">
        $(document).ready(function() {

            // ✅ GLOBAL AJAX ERROR HANDLER (optional but recommended)
            $(document).ajaxError(function(event, xhr) {
                if (xhr.status === 403) {
                    Swal.fire(
                        'Permission Denied',
                        xhr.responseJSON?.message || 'You do not have permission to perform this action.',
                        'error'
                    );
                }
            });

            GetPermissionRecord();
            // Fetch and display all permissions
            function GetPermissionRecord(search = '') {
                $.ajax({
                    url: '{{ route('admin.permissions.fetch') }}',
                    method: 'GET',
                    data: { search: search }, // pass search query
                    success: function(response) {
                        $("#all_permissions").html(response);
                        if ($("#kt_table_widget_1").length) {
                            $("#kt_table_widget_1").DataTable({
                                "order": [[0, "asc"]],
                                "language": { "lengthMenu": "Show _MENU_" },
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 403) {
                            Swal.fire('Permission Denied', xhr.responseJSON?.message, 'error');
                        } else {
                            Swal.fire('Error', 'Failed to load permissions.', 'error');
                        }
                    }
                });
            }


            // Search permissions dynamically
            $('#permission_search').on('keyup', function() {
                let query = $(this).val();
                GetPermissionRecord(query);
            });

            // ✅ CREATE / UPDATE
            $('#PermissionForm').on('submit', function(e) {
                e.preventDefault();

                const form = this;
                const id = $('#permission_id').val();

                let url = "{{ route('admin.permissions.store') }}";
                let method = "POST";

                if (id) {
                    url = "/permissions/" + id;
                    method = "POST";
                }

                let formData = new FormData(form);
                if (id) formData.append('_method', 'PUT');

                $('#permission_save_button')
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
                            $('#permission_id').val('');
                            $('#permission_save_button').text('Save Permission');
                            $('#permission_cancel_button').hide();

                            GetPermissionRecord();

                            Swal.fire({
                                icon: 'success',
                                title: id ? 'Permission Updated Successfully' : 'Permission Created Successfully',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    },

                    error: function(xhr) {
                        if (xhr.status === 403) {
                            Swal.fire(
                                'Permission Denied',
                                xhr.responseJSON?.message || 'You do not have permission to perform this action.',
                                'error'
                            );
                        } else if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, val) {
                                $(form).find('.' + key + '_error').text(val[0]);
                            });
                        } else {
                            Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                        }
                    },

                    complete: function() {
                        $('#permission_save_button')
                            .text('Save Permission')
                            .prop('disabled', false);
                    }
                });
            });

            // Cancel button
            $('#permission_cancel_button').on('click', function() {
                $('#PermissionForm')[0].reset();
                $('#permission_id').val('');
                $('#permission_save_button').text('Save Permission');
                $(this).hide();
            });

            // ✅ EDIT
            $(document).on('click', '.permission_edit', function() {
                const id = $(this).data('id');

                $.get("{{ route('admin.permissions.show', ':id') }}".replace(':id', id))
                    .done(function(response) {
                        $("#permission_id").val(response.id);
                        $("#permission_name").val(response.name);

                        $('#permission_save_button').text("Update Permission");
                        $('#permission_cancel_button').show();
                    })
                    .fail(function(xhr) {
                        if (xhr.status === 403) {
                            Swal.fire('Permission Denied', xhr.responseJSON?.message, 'error');
                        } else {
                            Swal.fire('Error', 'Failed to fetch permission.', 'error');
                        }
                    });
            });

            // ✅ DELETE
            $(document).on('click', '.permission_delete', function() {

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
                        url: "{{ route('admin.permissions.destroy', ':id') }}".replace(':id', id),
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },

                        success: function() {
                            GetPermissionRecord();

                            Swal.fire({
                                icon: 'success',
                                title: 'Permission Deleted Successfully',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        },

                        error: function(xhr) {
                            if (xhr.status === 403) {
                                Swal.fire(
                                    'Permission Denied',
                                    xhr.responseJSON?.message || 'You do not have permission.',
                                    'error'
                                );
                            } else {
                                Swal.fire('Error', 'Delete failed. Try again.', 'error');
                            }
                        }
                    });
                });
            });

        });
    </script>
    @endpush
@endsection
