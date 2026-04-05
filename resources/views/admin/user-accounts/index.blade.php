@extends('layouts.admin')
@section('title', 'User Management')

@section('page-title', 'User Management')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('homepage') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">User</li>
@endsection

@section('content')
<div class="container" id="kt_content_container">
    <div class="row g-xl-8">

        <!-- Stepper Form -->
        <div class="col-xxl-12">
            <div class="card card-flush mb-5 mb-xxl-8">
                <div class="card-header mt-5">
                    <div class="alert alert-primary d-flex align-items-start mb-4">
                        <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                        <div>
                            <h5 class="mb-1 fw-bold">Create a New User</h5>
                            <p class="mb-0 text-muted">
                                Complete the steps below to create a new user account. Ensure all information is accurate, set secure login credentials, and assign the appropriate role before submitting.
                            </p>
                            <p class="mb-0 text-info">
                                Note: Selecting a College is <strong>optional</strong> for the Graduate Studies Campus.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-1">
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-lg-row"
                        id="kt_stepper_example_vertical">

                        <!-- Stepper Nav -->
                        <div class="d-flex flex-row-auto w-100 w-lg-300px">
                            <div class="stepper-nav flex-column">
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">User Details</h3>
                                            <div class="stepper-desc">Full name, phone, address, campus and department.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Login Credentials</h3>
                                            <div class="stepper-desc">Email and password.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Roles & Permissions</h3>
                                            <div class="stepper-desc">Assign role for the user.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper d-flex align-items-center">
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">4</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Review & Submit</h3>
                                            <div class="stepper-desc">Confirm all details before submitting.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Stepper Content -->
                        <div class="flex-row-fluid">
                            <form id="UserForm" class="form w-lg-500px mx-auto" novalidate
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id">

                                <!-- Step 1: User Details -->
                                <div class="flex-column current" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control form-control-solid" name="name"
                                            placeholder="Enter full name" />
                                        <span class="text-danger name_error"></span>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control form-control-solid" name="phone"
                                            placeholder="Enter phone number" />
                                        <span class="text-danger phone_error"></span>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control form-control-solid" name="address"
                                            placeholder="Enter address" />
                                        <span class="text-danger address_error"></span>
                                    </div>
                                    {{-- <div class="fv-row mb-10">
                                        <label class="form-label">Campus</label>
                                        <select name="campus_id" id="campus_select"
                                            class="form-select form-select-solid">
                                            <option value="">Select Campus</option>
                                            @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger campus_id_error"></span>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="form-label">College</label>
                                        <select name="department_id" id="department_select"
                                            class="form-select form-select-solid">
                                            <option value="">Select College</option>
                                        </select>
                                        <span class="text-danger department_id_error"></span>
                                    </div> --}}
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Campus</label>

                                        <select name="campus_id" id="campus_select"
                                            class="form-select form-select-solid" {{
                                            !auth()->user()->hasRole('super-admin') ? 'disabled' : '' }}>

                                            <option value="">Select Campus</option>

                                            @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}" {{ !auth()->user()->hasRole('super-admin')
                                                && auth()->user()->campus_id == $campus->id ? 'selected' : '' }}>
                                                {{ $campus->name }}
                                            </option>
                                            @endforeach
                                        </select>

                                        {{-- Hidden input (important when disabled) --}}
                                        @if(!auth()->user()->hasRole('super-admin'))
                                        <input type="hidden" name="campus_id" value="{{ auth()->user()->campus_id }}">
                                        @endif

                                        <span class="text-danger campus_id_error"></span>
                                    </div>

                                    <div class="fv-row mb-10">
                                        <label class="form-label">College</label>
                                        <select name="department_id" id="department_select"
                                            class="form-select form-select-solid">
                                            <option value="">Select College</option>
                                        </select>
                                        <span class="text-danger department_id_error"></span>
                                    </div>

                                </div>

                                <!-- Step 2: Login Credentials -->
                                <div class="flex-column" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-solid" name="email"
                                            placeholder="Enter email" />
                                        <span class="text-danger email_error"></span>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Password</label>

                                        <div class="position-relative">
                                            <input type="password" id="password" class="form-control form-control-solid"
                                                name="password" placeholder="Enter password" />

                                            <i class="toggle-password fas fa-eye position-absolute"
                                                data-target="#password"
                                                style="cursor: pointer; right: 15px; top: 50%; transform: translateY(-50%);">
                                            </i>
                                        </div>

                                        <span class="text-danger password_error"></span>
                                    </div>
                                </div>

                                <!-- Step 3: Roles -->
                                {{-- <div class="flex-column" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Role</label>

                                        @if (auth()->user()->hasRole(['super-admin']))

                                        <!-- Super-admin and other admin can select multiple roles -->

                                        <select class="form-select form-control-solid" name="role[]"
                                            data-control="select2" data-placeholder="Select role">
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">
                                                {{ $roleLabels[$role->name] ?? $role->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @else
                                        <!-- Non-super-admin automatically gets student role -->
                                        <input type="text" class="form-control form-control-solid" name="role[]"
                                            value="student" readonly>
                                        @endif

                                        <span class="text-danger role_error"></span>
                                    </div>
                                </div> --}}
                               <div class="flex-column" data-kt-stepper-element="content">
                                    <div class="fv-row mb-10">
                                        <label class="form-label">Role</label>

                                        @if (auth()->user()->hasRole('super-admin'))
                                            <select class="form-select form-control-solid" name="role[]" data-control="select2" data-placeholder="Select Role" multiple>
                                                {{-- placeholder disabled so it disappears when user selects --}}
                                                <option value="" disabled>{{ old('role') ? '' : 'Select Role' }}</option>

                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" {{ collect(old('role'))->contains($role->name) ? 'selected' : '' }}>
                                                        {{ $roleLabels[$role->name] ?? $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="hidden" name="role[]" value="student">
                                            <input type="text" class="form-control form-control-solid" value="student" readonly>
                                        @endif

                                       <span class="text-danger role_error"></span>
                                    </div>
                                </div>
                                <!-- Step 4: Review -->
                                <div class="flex-column" data-kt-stepper-element="content">
                                    <h5>Review User Information</h5>
                                    <p><strong>Full Name:</strong> <span id="review_full_name"></span></p>
                                    <p><strong>Email:</strong> <span id="review_email"></span></p>
                                    <p><strong>Phone:</strong> <span id="review_phone"></span></p>
                                    <p><strong>Address:</strong> <span id="review_address"></span></p>
                                    <p><strong>Campus:</strong> <span id="review_campus"></span></p>
                                    <p><strong>College:</strong> <span id="review_department"></span></p>
                                    <p><strong>Role:</strong> <span id="review_role"></span></p>
                                </div>

                                <!-- Stepper Actions -->
                                <div class="d-flex justify-content-between mt-5">
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-stepper-action="previous">Back</button>
                                        <button type="button" class="btn btn-warning" id="user_cancel_button"
                                            style="display:none">Cancel update</button>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-primary btn-sm"
                                            data-kt-stepper-action="next">Continue</button>
                                        <button type="submit" class="btn btn-success btn-sm"
                                            data-kt-stepper-action="submit" id="user_save_button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Stepper -->
                </div>
            </div>
        </div>

        <!-- User Table -->
        <div class="col-xxl-12">
            <div class="card card-xxl-stretch mb-5 mb-xl-3">
                <div class="card-header border-0 pt-5 pb-3">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-boldest text-gray-800 fs-2">User Management</span>
                        <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your users</span>
                    </h3>
                    <div class="card-toolbar">
                        <!-- Search -->
                        <div class="position-relative pe-6 my-1">
                            <span
                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                <!-- SVG icon here -->
                            </span>
                            <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10"
                                id="search_user" placeholder="Search" />
                        </div>
                        <!-- Filter -->
                        <div class="my-1">
                            <select class="form-select form-select-sm form-select-solid fw-bolder w-300px"
                                id="campusFilter">
                                <option value="">Select School Campus</option>
                                @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body py-0">
                    <div id="all_users">
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
<script>
    $(document).ready(function() {

            /**
         * ==========================================
         * Toggle Password Visibility (Eye Icon)
         * ==========================================
         */
        $(document).on('click', '.toggle-password', function () {

            const target = $(this).data('target');
            const input = $(target);

            if (input.length === 0) return; // prevent error

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            }

        });


            /**
         * ==========================================
         * Stepper Initialization
         * ==========================================
         */
        var currentStep = 0;
        var totalSteps = $('[data-kt-stepper-element="content"]').length;

        function showStep(index) {
            $('[data-kt-stepper-element="content"]').hide().removeClass('current d-block');
            $('[data-kt-stepper-element="content"]').eq(index).show().addClass('current d-block');

            $('[data-kt-stepper-element="nav"]').each(function(i) {
                $(this).removeClass('current completed');
                if (i < index) $(this).addClass('completed');
                if (i === index) $(this).addClass('current');
            });

            if (index === 0) {
                $('[data-kt-stepper-action="previous"]').hide();
            } else {
                $('[data-kt-stepper-action="previous"]').show();
            }

            if (index === totalSteps - 1) {
                $('[data-kt-stepper-action="next"]').hide();
                $('#user_save_button').show();

                // Fill review
                // let roles = $('[name="role[]"] option:selected').map(function() {
                //     return $(this).text();
                // }).get().join(', ');
                let roleElement = $('[name="role[]"]');
                let roles = '';

                if (roleElement.is('select')) {
                    roles = roleElement.find('option:selected').map(function() {
                        return $(this).text();
                    }).get().join(', ');
                } else {
                    roles = roleElement.val();
                }

                let campus = $('#campus_select option:selected').text() || 'N/A';
                let department = $('#department_select option:selected').text() || 'N/A';

                $('#review_full_name').text($('[name="name"]').val());
                $('#review_email').text($('[name="email"]').val());
                $('#review_phone').text($('[name="phone"]').val());
                $('#review_address').text($('[name="address"]').val());
                $('#review_role').text(roles || 'No Role');
                $('#review_campus').text(campus);
                $('#review_department').text(department);
            } else {
                $('[data-kt-stepper-action="next"]').show();
                $('#user_save_button').hide();
            }
        }
            // Initialize first step
        showStep(currentStep);
            /**
         * ==========================================
         * Stepper Navigation (Next / Previous)
         * ==========================================
         */
        $('[data-kt-stepper-action="next"]').click(function() {
            if (currentStep < totalSteps - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });

        $('[data-kt-stepper-action="previous"]').click(function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

            /**
         * ==========================================
         * Cancel Button (Reset Form)
         * ==========================================
         */
        $('#user_cancel_button').click(function() {
            $('#UserForm')[0].reset();
            $('#user_id').val('');
            $('[name="role[]"]').val(null).trigger('change');
            $(this).hide();
            currentStep = 0;
            showStep(currentStep);
        });



        /**
         * ==========================================
         * Load Departments based on Campus
         * ==========================================
         */
        // $('#campus_select').on('change', function() {
        //     var campusId = $(this).val();
        //     $('#department_select').html('<option value="">Loading...</option>');

        //     if (campusId) {
        //         $.get('/user-accounts/departments/' + campusId, function(data) {
        //             var options = '<option value="">Select College</option>';
        //             data.forEach(function(dept) {
        //                 options += `<option value="${dept.id}">${dept.name}</option>`;
        //             });
        //             $('#department_select').html(options);

        //             // If editing, select previous department
        //             var selectedDept = $('#department_select').data('selected');
        //             if (selectedDept) {
        //                 $('#department_select').val(selectedDept).trigger('change');
        //                 $('#department_select').removeData('selected'); // clear after use
        //             }
        //         });
        //     } else {
        //         $('#department_select').html('<option value="">Select College</option>');
        //     }
        // });

        // -------------------------
        // Load Departments
        // -------------------------
        function loadDepartments(campusId, selectedDept = null) {
            $('#department_select').html('<option value="">Loading...</option>');
            if (campusId) {
                $.get('/user-accounts/departments/'+campusId,function(data){
                    let options = '<option value="">Select College</option>';
                    data.forEach(d => options += `<option value="${d.id}">${d.name}</option>`);
                    $('#department_select').html(options);
                    if(selectedDept) $('#department_select').val(selectedDept);
                });
            } else {
                $('#department_select').html('<option value="">Select College</option>');
            }
        }

        // On Campus Change
        $('#campus_select').on('change', function(){ loadDepartments($(this).val()); });

        // Auto load on page ready
        let initialCampus = $('#campus_select').val();
        if(initialCampus) loadDepartments(initialCampus);

        // -------------------------
        // Edit User
        // -------------------------
        $(document).on('click', '.user_edit', function(){
            const id = $(this).data('id');
            $.get(`/user-accounts/${id}`, function(res){
                $('#user_id').val(res.id);
                $('[name="name"]').val(res.name);
                $('[name="email"]').val(res.email);
                $('[name="phone"]').val(res.profile?.phone ?? '');
                $('[name="address"]').val(res.profile?.address ?? '');
                $('[name="role[]"]').val(res.roles.map(r => r.name)).trigger('change');

                $('#campus_select').val(res.campus_id);
                loadDepartments(res.campus_id, res.department_id);

                $('#user_cancel_button').show();
                currentStep = 0; showStep(currentStep);
            });
        });









        // Get user table with optional search & campus
        function GetUserRecord(search = '') {
            let campusFilter = $('#campusFilter').val();

            $.ajax({
                url: '{{ route('admin.user-accounts.fetch') }}',
                method: 'GET',
                data: {
                    search: search,
                    campus: campusFilter
                },
                success: function(response) {
                    $("#all_users").html(response);
                    $("#kt_table_widget_1").DataTable({
                        "order": [
                            [0, "asc"]
                        ],
                        "language": {
                            "lengthMenu": "Show _MENU_"
                        }
                    });
                },
                error: function(xhr) {
                    let message = xhr.responseJSON?.message || 'Failed to load users';
                    Swal.fire('Error', message, 'error');
                }
            });
        }

        // Initial load
        GetUserRecord();

        // Search input
        $('#search_user').on('keyup', function() {
            let query = $(this).val();
            GetUserRecord(query);
        });

        // Campus filter
        $('#campusFilter').on('change', function() {
            GetUserRecord($('#search_user').val()); // include search
        });



        $('#UserForm').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            const id = $('#user_id').val();
            let url = '{{ route('admin.user-accounts.store') }}';
            let method = "POST";
            let formData = new FormData(form);
            if (id) {
                url = "/user-accounts/" + id;
                formData.append('_method', 'PUT');
            }

            $('#user_save_button').prop('disabled', true).text('Please wait...');
            $(form).find('span.text-danger').text('');

            $.ajax({
                url: url,
                method: method,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 422) {
                        $.each(response.errors, function(key, val) {
                            $(form).find('.' + key + '_error').text(val[0]);
                        });
                    } else {
                        form.reset();
                        $('#user_id').val('');
                        $('[name="role[]"]').val(null).trigger('change');
                        $('#user_cancel_button').hide();
                        currentStep = 0;
                        showStep(currentStep);
                        GetUserRecord();
                        Swal.fire({
                            icon: 'success',
                            title: id ? 'User Updated Successfully' :
                                'User Created Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function(xhr) {
                    let message = 'An error occurred!';

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorList = '';

                        $.each(errors, function(key, value) {
                            errorList += `<li>${value[0]}</li>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            html: `<ul style="text-align:center; list-style: none; padding-left: 0; color:red;">${errorList}</ul>`
                        });

                        return;
                    }

                    if (xhr.status === 401) {
                        message = 'Unauthenticated. Please login.';
                        window.location.href = '/login';
                    } else if (xhr.status === 403) {
                        message = 'Unauthorized. You do not have permission.';
                    } else if (xhr.responseJSON?.message) {
                        message = xhr.responseJSON.message;
                    }

                    Swal.fire('Error', message, 'error');
                },
                complete: function() {
                    $('#user_save_button').prop('disabled', false).text('Submit');
                }
            });
        });

        // // Edit user
        // $(document).on('click', '.user_edit', function() {
        //     const id = $(this).data('id');
        //     $.get(`/user-accounts/${id}`, function(response) {
        //         $('#user_id').val(response.id);
        //         $('[name="name"]').val(response.name);
        //         $('[name="email"]').val(response.email);
        //         $('[name="phone"]').val(response.profile?.phone ?? '');
        //         $('[name="address"]').val(response.profile?.address ?? '');
        //         let roles = response.roles.map(r => r.name);
        //         $('[name="role[]"]').val(roles).trigger('change');

        //         // Store previous department in data attribute
        //         $('#department_select').data('selected', response.department_id ?? '');

        //         //  Set campus and trigger department load
        //         $('#campus_select').val(response.campus_id).trigger('change');

        //         $('#user_cancel_button').show();
        //         currentStep = 0;
        //         showStep(currentStep);
        //     });
        // });

        // Delete user
        $(document).on('click', '.user_delete', function() {
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
                    url: `/user-accounts/${id}`,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        GetUserRecord();
                        Swal.fire({
                            icon: 'success',
                            title: 'User Deleted Successfully',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    error: function(xhr) {
                        let message = xhr.responseJSON?.message ||
                            'Failed to delete user';
                        if (xhr.status === 401) window.location.href = '/login';
                        else if (xhr.status === 403) message =
                            'Unauthorized. You do not have permission.';
                        Swal.fire('Error', message, 'error');
                    }
                });
            });
        });

    });
</script>
@endpush
@endsection
