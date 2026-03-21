@extends('layouts.admin')
@section('title', 'Department Management')
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
                                    <h5 class="mb-1 fw-bold">Create a New Department</h5>
                                    <p class="mb-0 text-muted">
                                        Please complete all required fields below to add a new department to the system. Make sure the department name is unique and accurate.
                                    </p>
                            </div>
                      </div>
                    </div>
                    <div class="card-body pt-1">
                        <form id="DepartmentForm" method="POST">
                            @csrf
                            <input type="hidden" id="department_id" name="department_id">

                            <div class="mb-7">
                                <label class="form-label fw-bold">Department Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="department_name" class="form-control form-control-solid"
                                    placeholder="Enter department name">
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
                                <button type="submit" class="btn btn-primary btn-sm float-end" id="department_save_button">Save
                                    Department</button>
                                <button type="button" class="btn btn-warning btn-sm float-end me-2" id="department_cancel_button"
                                    style="display:none">Cancel</button>
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
                        <span class="card-label fw-boldest text-gray-800 fs-2">Department Management</span>
                        <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your departments</span>
                    </h3>
                    <div class="card-toolbar">
                        <!-- Search -->
                        <div class="position-relative pe-6 my-1">
                            <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                <!-- SVG icon here -->
                            </span>
                            <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10" name="search" placeholder="Search" />
                        </div>

                    </div>
                </div>

                <div class="card-body py-0">
                    <div id="all_departments">
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

    // ✅ CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ✅ GLOBAL 403 HANDLER
    $(document).ajaxError(function(event, xhr) {
        if (xhr.status === 403) {
            Swal.fire(
                'Permission Denied',
                xhr.responseJSON?.message || 'You do not have permission to perform this action.',
                'error'
            );
        }
    });

    // ✅ FETCH DEPARTMENTS
    function GetDepartmentRecord() {
        $.ajax({
            url: '{{ route('admin.departments.fetch') }}',
            method: 'GET',

            success: function(response) {
                $("#all_departments").html(response);

                $("#kt_table_widget_1").DataTable({
                    "order": [[0, "asc"]],
                    "language": {
                        "lengthMenu": "Show _MENU_",
                    },
                });
            },

            error: function(xhr) {
                if (xhr.status === 403) {
                    Swal.fire('Permission Denied', xhr.responseJSON?.message, 'error');
                } else {
                    Swal.fire('Error', 'Failed to load departments.', 'error');
                }
            }
        });
    }

    GetDepartmentRecord();

    // ✅ CREATE / UPDATE
    $('#DepartmentForm').on('submit', function(e) {
        e.preventDefault();

        const form = this;
        const id = $('#department_id').val();

        let url = "{{ route('admin.departments.store') }}";
        let method = "POST";

        if (id) {
            url = "/departments/" + id;
            method = "POST";
        }

        let formData = new FormData(form);
        if (id) formData.append('_method', 'PUT');

        $('#department_save_button')
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
                    $('#department_id').val('');
                    $('#department_save_button').text('Save Department');
                    $('#department_cancel_button').hide();

                    GetDepartmentRecord();

                    Swal.fire({
                        icon: 'success',
                        title: id ? 'Department Updated Successfully' : 'Department Created Successfully',
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
                    Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                }
            },

            complete: function() {
                $('#department_save_button')
                    .text('Save Department')
                    .prop('disabled', false);
            }
        });
    });

    // ✅ CANCEL
    $('#department_cancel_button').on('click', function() {
        $('#DepartmentForm')[0].reset();
        $('#department_id').val('');
        $('#department_save_button').text('Save Department');
        $(this).hide();
    });

    // ✅ EDIT
    $(document).on('click', '.department_edit', function() {
        const id = $(this).data('id');

        $.get("{{ route('admin.departments.show', ':id') }}".replace(':id', id))
            .done(function(response) {
                $("#department_id").val(response.id);
                $("#department_name").val(response.name);
                $("#campus_id").val(response.campus_id);

                $('#department_save_button').text("Update Department");
                $('#department_cancel_button').show();
            })
            .fail(function(xhr) {
                if (xhr.status === 403) {
                    Swal.fire('Permission Denied', xhr.responseJSON?.message, 'error');
                } else {
                    Swal.fire('Error', 'Failed to fetch department.', 'error');
                }
            });
    });

    // ✅ DELETE
    $(document).on('click', '.department_delete', function() {

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
                url: "{{ route('admin.departments.destroy', ':id') }}".replace(':id', id),
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },

                success: function() {
                    GetDepartmentRecord();

                    Swal.fire({
                        icon: 'success',
                        title: 'Department Deleted Successfully',
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
