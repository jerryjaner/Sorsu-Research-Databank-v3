@extends('layouts.student')

@section('title')
Profile Account
@endsection

@section('content')

<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <div class="page-title d-flex flex-column">
            <h1 class="text-white fw-bold fs-2qx my-1 me-5">Manage Account</h1>
        </div>
        <div class="d-flex align-items-center flex-wrap py-2">
            <a href="{{ route('homepage') }}" class="btn btn-sm btn-info my-2">
                <i class="fa-duotone fa-solid fa-arrow-left"></i> Back to home
            </a>
        </div>
    </div>
</div>

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <form id="profile-form" class="form" action="{{ route('student-profile-account.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body p-9">
                    <h4 class="mb-6">Profile Information</h4>

                    <!-- Avatar Upload -->
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type="file" id="imageUpload" name="image_upload" accept=".png, .jpg, .jpeg">
                            <label for="imageUpload"></label>
                        </div>

                        <div class="avatar-preview">
                            <div id="imagePreview" style="
            background-image: url('{{ Auth::user()->profile && Auth::user()->profile->profile_picture
                ? asset('storage/profile-picture/images/' . Auth::user()->profile->profile_picture)
                : asset('student/assets/media/avatars/default.png') }}');
            background-size: cover;
            background-position: center;
            ">
                            </div>
                        </div>

                        @error('image_upload')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div class="row mb-6 mt-5">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="name"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                value="{{ Auth::user()->name }}" />
                            @error('name')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Email Address</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                value="{{ Auth::user()->email }}" />
                            @error('email')
                            <span class="text-danger mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Account Role</label>
                        <div class="col-lg-8">
                            <input type="text" name="role"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                value="{{ ucwords(str_replace('_', ' ', Auth::user()->getRoleNames()->first() )) }}"
                                readonly />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6 required">New Password</label>
                        <div class="col-lg-8 position-relative">
                            <input type="password" name="password" id="password"
                                class="form-control form-control-lg form-control-solid" placeholder="New Password" />
                            <i class="toggle-password fas fa-eye" data-target="#password"
                                style="cursor: pointer; position: absolute; right: 20px; top: 15px;"></i>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Confirm Password</label>
                        <div class="col-lg-8 position-relative">
                            <input type="password" name="password_confirmation" id="confirmPassword"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Confirm New Password" />
                            <i class="toggle-password fas fa-eye" data-target="#confirmPassword"
                                style="cursor: pointer; position: absolute; right: 20px; top: 15px;"></i>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
<script>
$('#imageUpload').on('change', function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            $('#imagePreview')
                .css('background-image', 'url(' + e.target.result + ')')
                .hide()
                .fadeIn(300);
        };

        reader.readAsDataURL(file);
    }
});
$(document).on('click', '.toggle-password', function () {
    const target = $(this).data('target');
    const input = $(target);

    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
    $(this).toggleClass('fa-eye fa-eye-slash');
});
</script>
@endpush
@endsection
