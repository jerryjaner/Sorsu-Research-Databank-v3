@extends('layouts.student')
@section('title', 'Login')
@section('content')
<div
    class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed auth-page-bg">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

            <!--begin::Form-->
            <form class="form w-100" action="{{ route('login') }}" method="POST" id="UserLogin">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">
                        Sign In to SorSu <br> Research Databank
                    </h1>
                </div>
                <!--end::Heading-->

                <!-- Display global error message -->
                @if(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Email input -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email"
                           class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                           placeholder="Enter your email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bold text-dark fs-6 mb-0">Password <span class="text-danger">*</span></label>
                        <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bold">
                            Forgot Password ?
                        </a>
                    </div>
                    <div class="position-relative">
                        <input type="password" name="password"
                               class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                               placeholder="Enter your password">
                        <i class="fas fa-eye toggle-password" style="cursor: pointer; position: absolute; right: 20px; top: 15px;"></i>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-lg w-100 mb-5 text-white" style="background-color: #E92210;">
                        Login
                    </button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
@push('script')


@endpush
@endsection
