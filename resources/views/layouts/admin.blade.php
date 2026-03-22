<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Rider Free  - Multipurpose Bootstrap 5 HTML Admin Dashboard Template
Upgrade to Pro: https://keenthemes.com/products/rider-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ asset('administrator/assets/media/logos/ssu-logo.png') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->

		<link href="{{URL::to('administrator/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{URL::to('administrator/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
				<link href="{{ URL::to('administrator/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        <style>
            .swal2-icon {
                margin-left: auto !important;
                margin-right: auto !important;
            }
        </style>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Brand-->
					<div class="aside-logo d-flex justify-content-center align-items-center pt-9 pb-7 px-9" id="kt_aside_logo">
                        <!--begin::Logo-->
                        <a href="{{ route('homepage') }}">
                            <img
                                alt="Logo"
                                src="{{ asset('administrator/assets/media/logos/ssu-logo.png') }}"
                                class="logo-default img-fluid"
                                style="max-height: 90px; object-fit: contain;"
                            />
                        </a>
                        <!--end::Logo-->
                    </div>
					<!--end::Brand-->
					<!--begin::Aside menu-->
					<div class="aside-menu flex-column-fluid px-3 px-lg-6">
						<!--begin::Aside Menu-->
						<!--begin::Menu-->
                         @include('layouts.partials.admin.sidebar')
						<!--end::Menu-->
					</div>
					<!--end::Aside menu-->

				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						@include('layouts.partials.admin.header')
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
						<!--begin::Container-->
						@yield('content')
						<!--end::Container-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
                        @include('layouts.partials.admin.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!--begin::Drawers-->
		<!--begin::Activities drawer-->

		<!--end::Activities drawer-->


		<!--end::Drawers-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop rounded-circle" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->

		{{-- <script>var hostUrl = "assets/";</script> --}}
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="{{URL::to('administrator/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{URL::to('administrator/assets/js/scripts.bundle.js')}}"></script>

		<script src="{{URL::to('administrator/assets/js/custom/widgets.js')}}"></script>
		<script src="{{ URL::to('administrator/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!--end::Page Custom Javascript-->

        <!--begin::Page Custom Javascript-->
        <script src="{{ asset('javascript/admin/ajax-setup.js') }}"></script>
        {{-- <script src="{{ asset('javascript/admin/datatable-setup.js') }}"></script> --}}
        {{-- <script src="{{ asset('javascript/admin/role/role-ajax.js') }}"></script> --}}
        <!--end::Page Custom Javascript-->


		<!--end::Javascript-->
	</body>
	<!--end::Body-->
    @stack('scripts')

</html>
