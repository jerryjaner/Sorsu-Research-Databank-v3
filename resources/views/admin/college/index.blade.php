@extends('layouts.admin')
@section('title', 'College Management')
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
                                <h5 class="mb-1 fw-bold">Create a New College</h5>
                                <p class="mb-0 text-muted">
                                    Complete all required fields below to add a new college.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-1">
                        <form id="DepartmentForm" method="POST">
                            @csrf
                            <input type="hidden" id="department_id" name="department_id">

                            <div class="mb-7">
                                <label class="form-label fw-bold">College Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="department_name"
                                    class="form-control form-control-solid" placeholder="Enter college name">
                                <span class="text-danger error-text name_error"></span>
                            </div>

                            <div class="mb-7">
                                <label class="form-label fw-bold">Campus Name <span class="text-danger">*</span></label>
                                <select name="campus_id" id="campus_id" class="form-select form-select-solid">
                                    <option value="">Select Campus</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error-text campus_id_error"></span>
                            </div>

                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary btn-sm float-end"
                                    id="department_save_button">Save College</button>
                                <button type="button" class="btn btn-warning btn-sm float-end me-2"
                                    id="department_cancel_button" style="display:none">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--  Table -->
            <div class="col-xxl-7">
                <div class="card card-xxl-stretch mb-5 mb-xl-3">
                    <div class="card-header border-0 pt-5 pb-3">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-boldest text-gray-800 fs-2">College Management</span>
                            <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your college</span>
                        </h3>
                        <div class="card-toolbar">
                            <!-- Search -->
                            <div class="position-relative pe-6 my-1">
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <!-- SVG icon here -->
                                </span>
                                <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10"
                                    name="search" id="search-college" placeholder="Search" />
                            </div>

                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div id="all_college">
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

                function GetCollegeRecord(search = '') {
                    $.ajax({
                        url: '{{ route('admin.college.fetch') }}',
                        method: 'GET',
                        data: {
                            search: search
                        },
                        success: function(response) {
                            $("#all_college").html(response);

                            // Initialize DataTable if there is table
                            if ($("#kt_table_widget_1").length) {
                                $("#kt_table_widget_1").DataTable({
                                    "order": [
                                        [1, "asc"]
                                    ],
                                    "destroy": true, // destroy previous table if exists
                                    "language": {
                                        "lengthMenu": "Show _MENU_"
                                    }
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Failed to load college.', 'error');
                        }
                    });
                }

                // Initial load
                GetCollegeRecord();

                // Live search
                $('#search-college').on('keyup', function() {
                    let query = $(this).val();
                    GetCollegeRecord(query);
                });


                // CREATE / UPDATE Department with spinner even on empty fields
                $('#DepartmentForm').on('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const id = $('#department_id').val();

                    let url = "{{ route('admin.college.store') }}"; // replace with your route
                    let method = "POST";
                    if (id) {
                        url = "/college/" + id; // update route
                        method = "POST";
                    }

                    let formData = new FormData(form);
                    if (id) formData.append('_method', 'PUT');

                    // ✅ Show spinner immediately
                    $('#department_save_button')
                        .html('please wait <span class="spinner-border spinner-border-sm ms-2"></span>')
                        .prop('disabled', true);

                    // Clear previous errors
                    $(form).find('span.error-text').text('');

                    // Slight delay to show spinner even for empty validation
                    setTimeout(function() {
                        // Client-side validation
                        let name = $('#department_name').val().trim();
                        let campus_id = $('#campus_id').val();
                        let hasError = false;

                        if (name === '') {
                            $('.name_error').text('College name is required');
                            hasError = true;
                        }
                        if (!campus_id) {
                            $('.campus_id_error').text('Campus selection is required');
                            hasError = true;
                        }

                        if (hasError) {
                            // Stop submission but keep spinner visible briefly
                            $('#department_save_button')
                                .html(id ? 'Update College' : 'Save College')
                                .prop('disabled', false);
                            return;
                        }

                        // If validation passes, send AJAX
                        $.ajax({
                            url: url,
                            method: method,
                            data: formData,
                            processData: false,
                            contentType: false,
                            dataType: 'json',

                            success: function(response) {
                                form.reset();
                                $('#department_id').val('');
                                $('#department_cancel_button').hide();
                                $('#department_save_button')
                                    .text('Save College')
                                    .prop('disabled', false);

                                GetCollegeRecord(); // refresh table

                                Swal.fire({
                                    icon: 'success',
                                    title: id ? 'College Updated Successfully' :
                                        'College Created Successfully',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            },

                            error: function(xhr) {
                                $('#department_save_button')
                                    .text(id ? 'Update College' : 'Save College')
                                    .prop('disabled', false);

                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;
                                    $.each(errors, function(key, val) {
                                        $(form).find('.' + key + '_error').text(val[
                                            0]);
                                    });
                                } else if (xhr.status === 403) {
                                    Swal.fire('Permission Denied', xhr.responseJSON
                                        ?.message || 'You do not have permission.',
                                        'error');
                                } else {
                                    Swal.fire('Error',
                                        'Something went wrong. Please try again.',
                                        'error');
                                }
                            }
                        });
                    }, 200); // small delay to let spinner appear
                });


                // CANCEL
                $('#department_cancel_button').on('click', function() {
                    $('#DepartmentForm')[0].reset();
                    $('#department_id').val('');
                    $(this).hide();
                    $('#department_save_button').text('Save College');
                });

                // EDIT
                $(document).on('click', '.department_edit', function() {
                    let id = $(this).data('id');
                    $.get("/college/" + id, function(response) {
                        $('#department_id').val(response.id);
                        $('#department_name').val(response.name);
                        $('#campus_id').val(response.campus_id);
                        $('#department_save_button').text('Update College');
                        $('#department_cancel_button').show();
                    });
                });

                // DELETE
                $(document).on('click', '.department_delete', function() {
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (!result.isConfirmed) return;

                        $.ajax({
                            url: "/college/" + id,
                            method: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                GetCollegeRecord();
                                Swal.fire('Deleted!', 'College has been deleted.',
                                    'success');
                            },
                            error: function() {
                                Swal.fire('Error', 'Delete failed.', 'error');
                            }
                        });
                    });
                });


            });
        </script>
    @endpush


@endsection
