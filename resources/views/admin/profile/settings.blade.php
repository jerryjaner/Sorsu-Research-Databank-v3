@extends('layouts.admin')
@section('title', 'Account Settings')

@section('page-title', 'Account Settings')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('homepage') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">Account Settings</li>
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ Auth::user()->profile && Auth::user()->profile->profile_picture
                                ? asset('storage/profile-picture/images/' . Auth::user()->profile->profile_picture)
                                : asset('administrator/assets/media/avatars/blank-profile.png') }}" alt="image" />
                            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                            </div>
                        </div>
                    </div>
                    <!--end::Pic-->

                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                        {{ Auth::user()->name }}

                                    </a>
                                    <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i></a>

                                    <a href="#" class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3">Active</a>
                                </div>
                                <!--end::Name-->

                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-profile-circle fs-4 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        {{ [
                                            'super-admin'      => 'Super Administrator',
                                            'bulan-admin'      => 'Bulan Administrator',
                                            'sorsogon-admin'   => 'Sorsogon Administrator',
                                            'castilla-admin'   => 'Castilla Administrator',
                                            'magallanes-admin' => 'Magallanes Administrator',
                                            'graduate-admin'   => 'Graduate Administrator',
                                            'student'          => 'Student',
                                        ][Auth::user()->roles->first()?->name ?? ''] ?? 'No Role Assigned' }}
                                    </a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-geolocation fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        {{ Auth::user()->profile->address }}
                                    </a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                        <i class="ki-duotone ki-sms fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->


                        </div>
                        <!--end::Title-->
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat: Total -->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="fs-2 fw-bold">{{ $managedUsersCount ?? 0 }}</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Managed Users</div>
                                    </div>
                                    <!--end::Stat-->

                                    <!--begin::Stat:  -->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="fs-2 fw-bold">{{ $activeSessions ?? 0 }}</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Active Sessions</div>
                                    </div>
                                    <!--end::Stat-->

                                    <!--begin::Stat: Success Rate-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="fs-2 fw-bold">{{ $profileCompletion ?? 0 }}%</div>
                                        <div class="fw-semibold fs-6 text-gray-500">Profile Completion</div>
                                    </div>
                                    <!--end::Stat-->
                                </div>
                            </div>
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->

                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('admin.profile.overview') ? 'active' : '' }}" href="{{ route('admin.profile.overview') }}">
                            Overview
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('admin.profile.settings') ? 'active' : '' }}" href="{{ route('admin.profile.settings') }}">
                            Settings
                        </a>
                    </li>

                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('admin.profile.security') ? 'active' : '' }}" href="{{ route('admin.profile.security') }}">
                            Security
                        </a>
                    </li>


                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--end::Navbar-->
        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">
                        Profile Details
                    </h3>
                </div>
                <!--end::Card title-->

                <!--begin::Action-->

                <!--end::Action-->
            </div>
            <!--begin::Card header-->

            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <form id="profile-form" class="form" action="{{ route('admin.profile.update', Auth::user()->profile->id ?? Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-9">

                        <!-- Avatar Upload -->
                        <div class="avatar-upload mb-6">
                            <div class="avatar-edit">
                                <input type="file" id="imageUpload" name="profile_picture" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="
                                    background-image: url('{{ Auth::user()->profile?->profile_picture
                                        ? asset('storage/profile-picture/images/' . Auth::user()->profile->profile_picture)
                                        : asset('administrator/assets/media/avatars/blank-profile.png') }}');
                                    background-size: cover;
                                    background-position: center;
                                "></div>
                            </div>
                            @error('profile_picture')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Name -->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="name" class="form-control form-control-lg form-control-solid" value="{{ Auth::user()->name }}" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Email Address</label>
                            <div class="col-lg-8">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ Auth::user()->email }}" />
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Phone</label>
                            <div class="col-lg-8">
                                <input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{ Auth::user()->profile?->phone }}" />
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                            <div class="col-lg-8">
                                <textarea name="address" class="form-control form-control-lg form-control-solid">{{ Auth::user()->profile?->address }}</textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">New Password</label>
                            <div class="col-lg-8 position-relative">
                                <input type="password" name="password" id="password" class="form-control form-control-lg form-control-solid" placeholder="New Password" />
                                <i class="toggle-password fas fa-eye" data-target="#password" style="cursor:pointer;position:absolute;right:20px;top:15px;"></i>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Confirm Password</label>
                            <div class="col-lg-8 position-relative">
                                <input type="password" name="password_confirmation" id="confirmPassword" class="form-control form-control-lg form-control-solid" placeholder="Confirm New Password" />
                                <i class="toggle-password fas fa-eye" data-target="#confirmPassword" style="cursor:pointer;position:absolute;right:20px;top:15px;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->

    </div>
    <!--end::Container-->
</div>
<!--end::Content-->
@push('scripts')
<script>
    $('#imageUpload').on('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                $('#imagePreview')
                    .css('background-image', 'url(' + e.target.result + ')')
                    .hide()
                    .fadeIn(300);
            };

            reader.readAsDataURL(file);
        }
    });
    $(document).on('click', '.toggle-password', function() {
        const target = $(this).data('target');
        const input = $(target);

        input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

</script>
@endpush
@endsection
