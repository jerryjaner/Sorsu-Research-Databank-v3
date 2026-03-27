@extends('layouts.admin')
@section('title', 'Dashboard Management')

@section('page-title', 'Dashboard Management')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('homepage') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">Dashboard</li>
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        <div class="row gx-5 gx-xl-10 mb-xl-10">
               <!--begin::Col: Big Clock & Today Stats-->
            <div class="col-lg-12 col-xl-12 col-xxl-6 mb-10 mb-xl-0">
                <div class="card card-flush shadow-sm rounded h-lg-100 text-center">
                    <div class="card-header pt-5 d-flex flex-column justify-content-center align-items-center">
                        <!-- Admin Name -->
                        <h3 class="card-title text-gray-800 fs-3 fw-bold">Welcome Back, {{ Auth::user()->name }} 👋</h3>
                        <hr class="w-75 border-secondary mt-3 mb-0">
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-5">

                        <!-- Big Digital Clock -->
                        <div class="bg-dark rounded px-10 py-10 mb-4 d-inline-block shadow-lg neon-clock">
                            <span id="digitalClock" class="fs-1 fw-bold text-white" style="letter-spacing:5px;"></span>
                            <div id="digitalSeconds" class="fs-6 text-white mt-1"></div>
                        </div>

                        <!-- Current Date -->
                        <span id="digitalDate" class="fs-5 text-gray-400 mb-5"></span>

                        <!-- Today Stats Cards -->
                        <div class="row g-3 w-100 px-3 justify-content-center">

                            <div class="col-6 col-md-3">
                                <div class="card shadow-sm rounded bg-light-primary h-100 py-3 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="bi bi-person-plus fs-2 text-primary mb-2"></i>
                                        <div class="fs-3 fw-bold">{{ $newUsersToday ?? 0 }}</div>
                                        <div class="fs-9 text-gray-500">New Users</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="card shadow-sm rounded bg-light-success h-100 py-3 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="bi bi-journal-text fs-2 text-success mb-2"></i>
                                        <div class="fs-3 fw-bold">{{ $researchToday ?? 0 }}</div>
                                        <div class="fs-9 text-gray-500">Research Submitted</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="card shadow-sm rounded bg-light-warning h-100 py-3 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="bi bi-download fs-2 text-warning mb-2"></i>
                                        <div class="fs-3 fw-bold">{{ $downloadsToday ?? 0 }}</div>
                                        <div class="fs-9 text-gray-500">Downloads</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-md-3">
                                <div class="card shadow-sm rounded bg-light-info h-100 py-3 hover-shadow">
                                    <div class="card-body text-center">
                                        <i class="bi bi-award fs-2 text-info mb-2"></i>
                                        <div class="fs-3 fw-bold">{{ $topResearcherTodayCount ?? 0 }}</div>
                                        <div class="fs-9 text-gray-500">Top Researcher</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col: Total Research & Users-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

                <!-- Total Research Card -->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10 bg-primary">
                    <div class="card-header pt-5">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ $totalResearch }}</span>
                            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">Total Research</span>
                        </div>
                        <div class="card-toolbar">
                            <i class="bi bi-journal-text fs-1 text-white opacity-75"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 mb-2">
                            <span>{{ $published }} Published</span>
                            <span>{{ $percentage }}%</span>
                        </div>
                        <div class="h-8px w-100 bg-white bg-opacity-25 rounded">
                            <div class="bg-white rounded h-8px" style="width: {{ $percentage }}%;"></div>
                        </div>
                        <span class="text-white opacity-50 fs-7 mt-3">Based on publication status</span>
                    </div>
                </div>

                <!-- User Roles Card -->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10 bg-light-primary shadow-sm rounded">
                    <div class="card-header pt-5 d-flex justify-content-between align-items-center">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bold text-primary me-2 lh-1 ls-n2">{{ $roleCounts->sum() }}</span>
                            <span class="text-gray-600 pt-1 fw-semibold fs-6">Total Users</span>
                        </div>
                        <div class="card-toolbar">
                            <i class="bi bi-people fs-1 text-primary"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center pt-3 pb-1" style="height: 220px;">
                        <canvas id="rolesChart" style="max-height:100%; max-width:100%;"></canvas>
                        <div class="d-flex flex-wrap justify-content-center align-items-center mt-3 gap-2"
                            style="max-height: 60px; overflow-y:auto; text-align:center;">
                            @foreach($roleLabels as $index => $role)
                            <div class="d-flex align-items-center text-truncate" style="max-width: 100px;">
                                <span
                                    style="display:inline-block;width:12px;height:12px;background-color:{{ ['#0d6efd','#198754','#ffc107','#dc3545','#6f42c1','#6c757d'][$index % 6] }};border-radius:50%;margin-right:6px;"></span>
                                <span class="text-gray-600 fs-7 text-truncate"
                                    title="{{ $role }} ({{ $roleCounts[$index] }})">
                                    {{ $role }} ({{ $roleCounts[$index] }})
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Col-->

            <!--begin::Col: Total Downloads & Highlights-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">

                <!-- Total Downloads Card -->
                <div class="card card-flush h-md-50 mb-5 mb-xl-10 bg-light-primary">
                    <div class="card-header pt-5">
                        <div class="card-title d-flex flex-column">
                            <span class="fs-2hx fw-bold text-primary me-2 lh-1 ls-n2">{{ $totalDownloads }}</span>
                            <span class="text-gray-600 pt-1 fw-semibold fs-6">Total Downloads</span>
                        </div>
                        <div class="card-toolbar">
                            <i class="bi bi-download fs-1 text-primary"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-end">
                        <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Research Engagement</span>
                        <span class="text-gray-500 fs-7 mb-3">Total number of downloaded research papers</span>
                        <div class="h-6px w-100 bg-light rounded">
                            <div class="bg-primary rounded h-6px" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                <!-- Highlights Card -->
                <div class="card card-flush h-lg-50 shadow-sm rounded bg-primary">
                    <div class="card-header pt-5 d-flex justify-content-between align-items-center">
                        <h3 class="card-title text-white fs-3 fw-bold">Highlights</h3>
                        <i class="bi bi-bar-chart-line fs-2 text-white opacity-75"></i>
                    </div>
                    <div class="card-body pt-5">
                        <!-- Top Researcher -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="text-white opacity-75 fw-semibold fs-6">Top Researcher</div>
                            <div class="d-flex align-items-center text-truncate" style="max-width: 180px;">
                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"></i>
                                <span class="text-white opacity-75 fw-bolder fs-6 text-truncate"
                                    title="{{ $topResearcherName }}">
                                    {{ $topResearcherName }}
                                </span>
                                <span class="text-white opacity-75 fw-bold fs-7 ms-1">({{ $topResearcherCount }}
                                    papers)</span>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-3"></div>

                        <!-- Most Downloaded Research -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="text-white opacity-75 fw-semibold fs-6">Most Downloaded Research</div>
                            <div class="d-flex align-items-center text-truncate" style="max-width: 180px;">
                                <i class="ki-duotone ki-arrow-up-right fs-2 text-primary me-2"></i>
                                <span class="text-white opacity-75 fw-bolder fs-6 text-truncate"
                                    title="{{ $topDownloaded->title ?? 'N/A' }}">
                                    {{ $topDownloaded->title ?? 'N/A' }}
                                </span>
                                <span class="text-white opacity-75 fw-bold fs-7 ms-1">({{ $topDownloaded->downloads ?? 0
                                    }})</span>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-3"></div>

                        <!-- New Users This Month -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="text-white opacity-75 fw-semibold fs-6">New Users This Month</div>
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"></i>
                                <span class="text-white opacity-75 fw-bolder fs-6">{{ $newUsersThisMonth ?? 0 }}</span>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-3"></div>

                        <!-- Avg Research per Campus -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-white opacity-75 fw-semibold fs-6">Avg Research per Campus</div>
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"></i>
                                <span class="text-white opacity-75 fw-bolder fs-6">{{ $avgResearchPerCampus ?? 0
                                    }}</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!--end::Col-->



        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Roles Chart
    const ctx = document.getElementById('rolesChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: @json($roleLabels),
            datasets: [{
                data: @json($roleCounts),
                backgroundColor: ['#0d6efd','#198754','#ffc107','#dc3545','#6f42c1','#6c757d'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true }
            }
        }
    });

    // Live Digital Clock & Date
    function updateDigitalClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2,'0');
        const minutes = String(now.getMinutes()).padStart(2,'0');
        const seconds = String(now.getSeconds()).padStart(2,'0');
        document.getElementById('digitalClock').textContent = `${hours}:${minutes}:${seconds}`;

        const options = { weekday:'long', year:'numeric', month:'long', day:'numeric' };
        document.getElementById('digitalDate').textContent = now.toLocaleDateString(undefined, options);
    }

    setInterval(updateDigitalClock, 1000);
    updateDigitalClock();
</script>
@endpush
@endsection
