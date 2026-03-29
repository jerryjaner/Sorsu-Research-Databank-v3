@extends('layouts.admin')
@section('title', 'Account Security')

@section('page-title', 'Account Security')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('homepage') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">Account Security</li>
@endsection
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class=" container-xxl " id="kt_content_container">

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

        <!--begin::Login sessions-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h3>Login Sessions</h3>
                </div>

                <div class="card-toolbar">
                    <div class="my-1 me-4">
                        <select class="form-select form-select-sm form-select-solid w-125px" onchange="window.location.href='?hours='+this.value">

                            <option value="1" {{ $hours == 1 ? 'selected' : '' }}>1 Hour</option>
                            <option value="6" {{ $hours == 6 ? 'selected' : '' }}>6 Hours</option>
                            <option value="12" {{ $hours == 12 ? 'selected' : '' }}>12 Hours</option>
                            <option value="24" {{ $hours == 24 ? 'selected' : '' }}>24 Hours</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Campus</th>
                                <th>Status</th>
                                <th>Device</th>
                                <th>IP Address</th>
                                <th>Last Activity</th>
                            </tr>
                        </thead>
                        <tbody class="fw-6 fw-semibold text-gray-600">
                            @forelse($rawSessions as $session)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold text-gray-800">{{ $session->name }}</span>
                                        @if($session->is_current)
                                        <span class="text-primary fs-7">This device</span>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $session->role }}</td>
                                <td>{{ $session->campus }}</td>
                                <td>
                                    @if($session->last_activity >= now()->subMinutes(5)->timestamp)
                                    <span class="badge badge-light-success">Active</span>
                                    @else
                                    <span class="badge badge-light-secondary">Offline</span>
                                    @endif
                                </td>
                                <td>{{ $session->device }}</td>
                                <td>{{ $session->ip_address }}</td>
                                <td>{{ $session->time }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-5">No login sessions found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        @if ($rawSessions->hasPages())
                        <nav>
                            <ul class="pagination pagination-sm">
                                {{-- Previous Page Link --}}
                                @if ($rawSessions->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $rawSessions->previousPageUrl() }}">&laquo;</a>
                                </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($rawSessions->links()->elements[0] as $page => $url)
                                @if ($page == $rawSessions->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                                @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($rawSessions->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $rawSessions->nextPageUrl() }}">&raquo;</a>
                                </li>
                                @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                                @endif
                            </ul>
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Login sessions-->

    </div>
    <!--end::Container-->
</div>
<!--end::Content-->
@endsection
