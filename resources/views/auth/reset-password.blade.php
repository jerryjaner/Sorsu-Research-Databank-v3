@extends('layouts.student')
@section('title', 'Reset Password')

@section('content')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

            <!--begin::Heading-->
            <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Reset Your Password</h1>
                <div class="text-gray-400 fw-semibold fs-4">
                    Enter your new password below to reset your account password.
                </div>
            </div>
            <!--end::Heading-->

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!--begin::Form-->
            <form method="POST" action="{{ route('password.store') }}" class="form w-100">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Email</label>
                    <input type="email" name="email"
                           value="{{ old('email', $request->email) }}"
                           required autofocus autocomplete="username"
                           class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                           placeholder="Enter your email" readonly>
                    @error('email')
                        <div class="is-invalid text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="fv-row mb-10 position-relative">
                    <label class="form-label fs-6 fw-bold text-dark">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" required autocomplete="new-password"
                           class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                           placeholder="Enter new password">
                    <i class="fas fa-eye toggle-password" style="cursor: pointer; position: absolute; right: 20px; top: 45px;"></i>
                    @error('password')
                        <div class="is-invalid text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="fv-row mb-10 position-relative">
                    <label class="form-label fs-6 fw-bold text-dark">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                           class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                           placeholder="Confirm new password">
                    <i class="fas fa-eye toggle-password" style="cursor: pointer; position: absolute; right: 20px; top: 45px;"></i>
                    @error('password_confirmation')
                        <div class="is-invalid text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-lg w-100 mb-5 text-white" style="background-color: #E92210;">
                        Reset Password
                    </button>
                </div>
            </form>
            <!--end::Form-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
@endsection


