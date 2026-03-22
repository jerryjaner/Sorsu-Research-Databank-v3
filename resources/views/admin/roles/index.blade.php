@extends('layouts.admin')
@section('title', 'Role Management')

@section('page-title', 'Role Management')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('homepage') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">Role</li>
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
                                    <h5 class="mb-1 fw-bold">Create a New Role</h5>
                                    <p class="mb-0 text-muted">
                                        Please complete all required fields below to add a new role to the system. Make sure the role name is unique and accurate.
                                    </p>
                            </div>
                      </div>
                    </div>
                    <div class="card-body pt-1">
                        <form id="RoleForm" method="POST">
                            @csrf
                            <input type="hidden" id="role_id" name="role_id">

                            {{-- <div class="mb-7">
                                <label class="form-label fw-bold">Role Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="role_name" class="form-control form-control-solid"
                                    placeholder="Enter role name">
                                <span class="text-danger error-text name_error"></span>
                            </div> --}}
                            <div class="mb-7">
                            <label class="form-label fw-bold">Role Name <span class="text-danger">*</span></label>
                                <select name="name" id="role_name"  class="form-select form-select-solid">
                                    <option value="">Select Roles</option>
                                    <option value="super-admin">Super Administrator</option>
                                    <option value="bulan-admin">Bulan Campus Administrator</option>
                                    <option value="sorsogon-admin">Sorsogon Campus Administrator</option>
                                    <option value="castilla-admin">Castilla Campus Administrator</option>
                                    <option value="magallanes-admin">Magallanes Campus Administrator</option>
                                    <option value="graduate-admin">Graduate School Administrator</option>
                                    <option value="student">Student</option>
                                </select>
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary btn-sm float-end" id="role_save_button">Save
                                    Role</button>
                                <button type="button" class="btn btn-warning btn-sm float-end me-2" id="role_cancel_button"
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
                            <span class="card-label fw-boldest text-gray-800 fs-2">Role Management</span>
                            <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your roles</span>
                        </h3>
                        <div class="card-toolbar">
                            <!-- Search -->
                            <div class="position-relative pe-6 my-1">
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <!-- SVG icon here -->
                                </span>
                                <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10"
                                    name="search" id="role_search" placeholder="Search" />
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div id="all_roles">
                            <div class="text-center py-5">
                                <span class="spinner-border text-primary"></span>
                                <div class="mt-2">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assign Permissions Modal -->
        <div class="modal fade" id="assignPermissionModal" tabindex="-1" aria-labelledby="assignPermissionLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-person-badge-fill me-2"></i> Assign Permissions</h5>
                        <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Info -->
                        <div class="alert alert-warning d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                            <div>
                                <strong>Assigning permissions:</strong>
                                <p class="mb-0">
                                    Assign permissions to this role to control what actions users with this role can
                                    perform.
                                    Check the boxes below, then click <strong>Save changes</strong>.
                                </p>
                            </div>
                        </div>

                        <input type="hidden" id="modal_role_id" name="role_id">

                        <!-- Permissions Grid -->
                        <div class="row g-3">
                            @foreach ($permissions as $permission)
                                <div class="col-md-4 col-sm-6">
                                    <label class="form-check form-check-custom form-check-solid d-flex align-items-center">
                                        <input class="form-check-input me-2" type="checkbox" value="{{ $permission->id }}"
                                            id="perm{{ $permission->id }}">
                                        <i class="bi bi-key-fill text-warning me-2"></i>
                                        <span>{{ $permission->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Close
                        </button>
                        <button type="button" id="savePermissionsBtn" class="btn btn-primary btn-sm">
                            <span id="saveBtnText"><i class="bi bi-check2-circle me-1"></i> Save changes</span>
                            <span id="saveBtnSpinner" class="spinner-border spinner-border-sm ms-1 d-none" role="status"
                                aria-hidden="true"></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

  @push('scripts')
<script>
$(document).ready(function() {

    // CSRF setup for AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Fetch roles table
    function GetRoleRecord(search = '') {
        $.get('{{ route('admin.roles.fetch') }}', { search: search })
        .done(function(response) {
            $("#all_roles").html(response);
            if($("#kt_table_widget_1").length){
                $("#kt_table_widget_1").DataTable({
                    "order": [[0, "asc"]],
                    "language": {"lengthMenu": "Show _MENU_"}
                });
            }
        })
        .fail(function(xhr){
            Swal.fire('Error', xhr.responseJSON?.message || 'Failed to load roles.', 'error');
        });
    }

    $('#role_search').on('keyup', function() {
        let query = $(this).val();
        GetRoleRecord(query);
    });
    GetRoleRecord();

    // Create / Update role
    $('#RoleForm').on('submit', function(e) {
        e.preventDefault();
        let form = this;
        let id = $('#role_id').val();
        let url = id ? "/roles/" + id : "{{ route('admin.roles.store') }}";
        let method = id ? "POST" : "POST";
        let formData = new FormData(form);
        if (id) formData.append('_method', 'PUT');

        $('#role_save_button').html('Please wait <span class="spinner-border spinner-border-sm ms-2"></span>').prop('disabled', true);
        $(form).find('span.error-text').text('');

        $.ajax({
            url: url,
            method: method,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json'
        })
        .done(function(response) {
            if (response.status === 422) {
                // Validation errors
                $.each(response.error, function(key, val) {
                    $(form).find('.' + key + '_error').text(val[0]);
                });
            } else {
                form.reset();
                $('#role_id').val('');
                $('#role_save_button').text('Save Role').prop('disabled', false);
                $('#role_cancel_button').hide();
                GetRoleRecord();
                Swal.fire({
                    icon: 'success',
                    title: id ? 'Role Updated Successfully' : 'Role Created Successfully',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        })
        .fail(function(xhr){
            if(xhr.status === 403){
                Swal.fire('Permission Denied', xhr.responseJSON?.message || 'You do not have permission to perform this action.', 'error');
            } else {
                Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
            }
        })
        .always(function(){
            $('#role_save_button').text('Save Role').prop('disabled', false);
        });
    });

    // Cancel button
    $('#role_cancel_button').on('click', function() {
        $('#RoleForm')[0].reset();
        $('#role_id').val('');
        $('#role_save_button').text('Save Role');
        $(this).hide();
    });

    // Edit role
    $(document).on('click', '.role_edit', function() {
        let id = $(this).data('id');
        $.get("{{ route('admin.roles.show', ':id') }}".replace(':id', id))
        .done(function(response){
            $("#role_id").val(response.id);
            $("#role_name").val(response.name);
            $('#role_save_button').text("Update Role");
            $('#role_cancel_button').show();
        })
        .fail(function(xhr){
            if(xhr.status === 403){
                Swal.fire('Permission Denied', xhr.responseJSON?.message || 'You cannot edit this role.', 'error');
            } else if(xhr.status === 404){
                Swal.fire('Not Found', 'Role not found.', 'error');
            } else {
                Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
            }
        });
    });

    // Delete role
    $(document).on('click', '.role_delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(!result.isConfirmed) return;
            $.ajax({
                url: "{{ route('admin.roles.destroy', ':id') }}".replace(':id', id),
                method: 'DELETE'
            })
            .done(function(){
                GetRoleRecord();
                Swal.fire({ icon: 'success', title: 'Role Deleted Successfully', showConfirmButton: false, timer: 3000 });
            })
            .fail(function(xhr){
                if(xhr.status === 403){
                    Swal.fire('Permission Denied', xhr.responseJSON?.message || 'You do not have permission to delete this role.', 'error');
                } else {
                    Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                }
            });
        });
    });

    // Assign permissions - open modal
    $(document).on('click', '.role_assign', function() {
        let roleId = $(this).data('id');
        $('#modal_role_id').val(roleId);
        $('#assignPermissionModal input[type=checkbox]').prop('checked', false);

        $.get('/roles/' + roleId + '/permissions')
        .done(function(data){
            data.forEach(function(id){
                $('#assignPermissionModal input[type=checkbox][value=' + id + ']').prop('checked', true);
            });
            $('#assignPermissionModal').modal('show');
        })
        .fail(function(xhr){
            if(xhr.status === 403){
                Swal.fire('Permission Denied', xhr.responseJSON?.message || 'You cannot view permissions.', 'error');
            } else {
                Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
            }
        });
    });

    // Save permissions
    $('#savePermissionsBtn').on('click', function() {
        let roleId = $('#modal_role_id').val();
        let permissions = [];

        $('#assignPermissionModal input[type=checkbox]:checked').each(function(){
            permissions.push($(this).val());
        });

        // Show spinner
        $('#saveBtnText').text('Saving...');
        $('#saveBtnSpinner').removeClass('d-none');
        $('#savePermissionsBtn').prop('disabled', true);

        $.post('/roles/' + roleId + '/permissions', { permission: permissions, _token: $('meta[name="csrf-token"]').attr('content') })
        .done(function(response){
            if(response.status === 200){
                $('#assignPermissionModal').modal('hide');
                Swal.fire({ icon: 'success', title: response.message, showConfirmButton: false, timer: 1500 });

                // Reload checkboxes
                $.get('/roles/' + roleId + '/permissions', function(data){
                    $('#assignPermissionModal input[type=checkbox]').prop('checked', false);
                    data.forEach(function(id){
                        $('#assignPermissionModal input[type=checkbox][value=' + id + ']').prop('checked', true);
                    });
                });
            }
        })
        .fail(function(xhr){
            if(xhr.status === 403){
                Swal.fire('Permission Denied', xhr.responseJSON?.message || 'You cannot assign permissions.', 'error');
            } else {
                Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
            }
        })
        .always(function(){
            $('#saveBtnText').html('<i class="bi bi-check2-circle me-1"></i> Save changes');
            $('#saveBtnSpinner').addClass('d-none');
            $('#savePermissionsBtn').prop('disabled', false);
        });
    });

});
</script>
@endpush
@endsection







