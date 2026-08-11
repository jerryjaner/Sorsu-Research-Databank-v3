@extends('layouts.admin')

@section('title', 'Dashboard Management')
@section('page-title', 'Dashboard Management')

@section('breadcrumb')
<li class="breadcrumb-item text-muted">
    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
</li>
<li class="breadcrumb-item text-dark">Dashboard</li>
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
    <div class="container-xxl" id="kt_content_container">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-8" style="background: linear-gradient(135deg, #0f172a 0%, #2563eb 50%, #38bdf8 100%);">
            <div class="card-body p-8 p-xl-10 position-relative">
               <div class="position-absolute top-0 end-0 opacity-10" style="width: 260px; height: 260px; border-radius: 999px; background: #fff; transform: translate(30%, -20%);"></div>
               <div class="row align-items-center position-relative">
                   <div class="col-xl-8">
                       <div class="d-flex align-items-center gap-3 mb-4">
                           <span class="badge bg-white bg-opacity-20 text-white px-3 py-2 rounded-pill fw-semibold">
                               <i class="fas fa-sparkles me-2"></i>Smart insight dashboard
                           </span>
                       </div>
                       <h2 class="text-white display-6 fw-bolder mb-3">Welcome back, {{ Auth::user()->name }}</h2>
                       <p class="text-white-50 fs-5 mb-0">Track research momentum, campus engagement, and publication health from one polished overview.</p>
                       <div class="d-flex flex-wrap gap-3 mt-5">
                           <a href="{{ route('admin.researches.index') }}" class="btn btn-light btn-sm fw-semibold px-4 py-2 rounded-pill">
                               <i class="fas fa-book-open me-2"></i>Review research
                           </a>
                           <a href="{{ route('admin.user-accounts.index') }}" class="btn btn-outline-light btn-sm fw-semibold px-4 py-2 rounded-pill">
                               <i class="fas fa-users me-2"></i>Manage users
                           </a>
                       </div>
                   </div>
                   <div class="col-xl-4 mt-8 mt-xl-0">
                       <div class="bg-white bg-opacity-10 border border-white border-opacity-25 rounded-4 p-5 text-white shadow">
                           <div class="d-flex justify-content-between align-items-center mb-3">
                               <span class="fs-5 fw-bold">Live overview</span>
                               <span class="badge bg-danger-subtle text-white ">
                                   <i class="fas fa-circle me-2 text-danger live-badge" style="font-size: 0.6rem;"></i>Live
                               </span>
                           </div>
                           <div id="digitalClock" class="fs-1 fw-bolder lh-1"></div>
                           <div id="digitalSeconds" class="text-white-50 fs-6 mt-2"></div>
                           <div id="digitalDate" class="text-white-50 fs-6 mt-2"></div>
                       </div>
                   </div>
               </div>
            </div>
        </div>

        <div class="row g-5 mb-8">
            <div class="col-md-6 col-xl-3">
               <div class="card border-0 shadow-sm rounded-4 h-100">
                   <div class="card-body p-5">
                       <div class="d-flex justify-content-between align-items-start">
                           <div>
                               <div class="text-muted small fw-semibold text-uppercase">Total research</div>
                               <div class="fs-2 fw-bold text-gray-800 mt-2">{{ $totalResearch }}</div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #2563eb 0%, #38bdf8 100%); color: #fff;">
                               <i class="fas fa-book-open"></i>
                           </div>
                       </div>
                       <div class="mt-4">
                           <div class="d-flex justify-content-between text-muted small">
                               <span>Published</span>
                               <span class="fw-semibold text-success">{{ $published }}</span>
                           </div>
                           <div class="progress rounded-pill mt-2" style="height: 8px;">
                               <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%;"></div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>

            <div class="col-md-6 col-xl-3">
               <div class="card border-0 shadow-sm rounded-4 h-100">
                   <div class="card-body p-5">
                       <div class="d-flex justify-content-between align-items-start">
                           <div>
                               <div class="text-muted small fw-semibold text-uppercase">Downloads</div>
                               <div class="fs-2 fw-bold text-gray-800 mt-2">{{ $totalDownloads }}</div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%); color: #fff;">
                               <i class="fas fa-download"></i>
                           </div>
                       </div>
                       <div class="mt-4">
                           <div class="text-muted small">Today</div>
                           <div class="fw-bold text-gray-800 mt-1">{{ $downloadsToday }} downloads</div>
                       </div>
                   </div>
               </div>
            </div>

            <div class="col-md-6 col-xl-3">
               <div class="card border-0 shadow-sm rounded-4 h-100">
                   <div class="card-body p-5">
                       <div class="d-flex justify-content-between align-items-start">
                           <div>
                               <div class="text-muted small fw-semibold text-uppercase">New users</div>
                               <div class="fs-2 fw-bold text-gray-800 mt-2">{{ $newUsersToday }}</div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #f59e0b 0%, #fb923c 100%); color: #fff;">
                               <i class="fas fa-user-plus"></i>
                           </div>
                       </div>
                       <div class="mt-4">
                           <div class="text-muted small">This month</div>
                           <div class="fw-bold text-gray-800 mt-1">{{ $newUsersThisMonth }} joined</div>
                       </div>
                   </div>
               </div>
            </div>

            <div class="col-md-6 col-xl-3">
               <div class="card border-0 shadow-sm rounded-4 h-100">
                   <div class="card-body p-5">
                       <div class="d-flex justify-content-between align-items-start">
                           <div>
                               <div class="text-muted small fw-semibold text-uppercase">Top researcher</div>
                               <div class="fs-2 fw-bold text-gray-800 mt-2">{{ $topResearcherTodayCount }}</div>
                           </div>
                           <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, #0f766e 0%, #2dd4bf 100%); color: #fff;">
                               <i class="fas fa-medal"></i>
                           </div>
                       </div>
                       <div class="mt-4">
                           <div class="text-muted small">Today</div>
                           <div class="fw-bold text-gray-800 mt-1 text-truncate" title="{{ $topResearcherName }}">{{ $topResearcherName }}</div>
                       </div>
                   </div>
               </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-xl-8">
               <div class="card border-0 shadow-sm rounded-4 h-100">
                   <div class="card-header border-0 bg-transparent px-6 pt-6 pb-0">
                       <div class="d-flex justify-content-between align-items-center">
                           <div>
                               <h3 class="fw-bold text-gray-800 mb-1">Research performance</h3>
                               <p class="text-muted mb-0">Publication progress and engagement health.</p>
                           </div>
                           <span class="badge rounded-pill bg-primary-subtle text-primary">{{ $percentage }}% published</span>
                       </div>
                   </div>
                   <div class="card-body p-6">
                       <div class="rounded-4 p-5 border border-light-subtle" style="background: linear-gradient(135deg, #f8fbff 0%, #eef6ff 100%);">
                           <div class="d-flex justify-content-between align-items-center mb-4">
                               <div>
                                   <div class="fw-bold text-gray-800">Publication coverage</div>
                                   <div class="text-muted small mt-1">{{ $published }} published out of {{ $totalResearch }} research items</div>
                               </div>
                               <div class="fs-2 fw-bolder text-primary">{{ $percentage }}%</div>
                           </div>
                           <div class="progress rounded-pill" style="height: 12px;">
                               <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $percentage }}%;"></div>
                           </div>
                           <div class="d-flex justify-content-between text-muted small mt-3">
                               <span>{{ $totalResearch - $published }} pending</span>
                               <span>{{ $avgResearchPerCampus }} avg / campus</span>
                           </div>
                       </div>

                       <div class="row g-4 mt-2">
                           <div class="col-md-6">
                               <div class="rounded-4 border p-4 h-100">
                                   <div class="d-flex align-items-center gap-3 mb-3">
                                       <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 42px; height: 42px; background: #eef2ff; color: #4f46e5;">
                                           <i class="fas fa-trophy"></i>
                                       </div>
                                       <div>
                                           <div class="text-muted small">Most downloaded</div>
                                           <div class="fw-bold text-gray-800 text-truncate" title="{{ $topDownloadedTitle }}">{{ $topDownloadedTitle }}</div>
                                       </div>
                                   </div>
                                   <div class="text-muted small">{{ $topDownloadedCount }} downloads</div>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="rounded-4 border p-4 h-100">
                                   <div class="d-flex align-items-center gap-3 mb-3">
                                       <div class="d-flex align-items-center justify-content-center rounded-3" style="width: 42px; height: 42px; background: #ecfdf5; color: #059669;">
                                           <i class="fas fa-chart-line"></i>
                                       </div>
                                       <div>
                                           <div class="text-muted small">Top researcher</div>
                                           <div class="fw-bold text-gray-800 text-truncate" title="{{ $topResearcherName }}">{{ $topResearcherName }}</div>
                                       </div>
                                   </div>
                                   <div class="text-muted small">{{ $topResearcherCount }} research entries</div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>

            <div class="col-xl-4">
               <div class="card border-0 shadow-sm rounded-4 h-100">
                   <div class="card-header border-0 bg-transparent px-6 pt-6 pb-0">
                       <div class="d-flex justify-content-between align-items-center">
                           <div>
                               <h3 class="fw-bold text-gray-800 mb-1">People & access</h3>
                               <p class="text-muted mb-0">Role distribution across the dashboard.</p>
                           </div>
                       </div>
                   </div>
                   <div class="card-body p-6">
                       @if ($roleLabels->isNotEmpty())
                           <div style="height: 220px;">
                               <canvas id="rolesChart"></canvas>
                           </div>
                           <div class="mt-4">
                               @foreach ($roleLabels as $index => $role)
                                   <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
                                       <div class="d-flex align-items-center gap-2">
                                           <span class="rounded-circle" style="display: inline-block; width: 10px; height: 10px; background-color: {{ ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#6f42c1', '#6c757d', '#0dcaf0'][$index % 7] }};"></span>
                                           <span class="text-gray-700 small fw-semibold">{{ $role }}</span>
                                       </div>
                                       <span class="text-muted small">{{ $roleCounts[$index] }}</span>
                                   </div>
                               @endforeach
                           </div>
                       @else
                           <div class="text-center text-muted py-10">No role data available yet.</div>
                       @endif
                   </div>
               </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mt-8">
            <div class="card-header border-0 bg-transparent px-6 pt-6 pb-0 d-flex justify-content-between align-items-center">
               <div>
                   <h3 class="fw-bold text-gray-800 mb-1">Recent research activity</h3>
                   <p class="text-muted mb-0">Latest submissions and how they’re performing.</p>
               </div>
               <a href="{{ route('admin.researches.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">
                   <i class="fas fa-arrow-right me-2"></i>View all
               </a>
            </div>
            <div class="card-body p-0">
               <div class="list-group list-group-flush">
                   @forelse ($recentResearches as $research)
                       <div class="list-group-item px-6 py-4">
                           <div class="d-flex justify-content-between align-items-start gap-3">
                               <div>
                                   <div class="fw-bold text-gray-800">{{ $research->title }}</div>
                                   <div class="text-muted small mt-1">{{ $research->author }} • {{ optional($research->campus)->name ?? 'Campus pending' }}</div>
                               </div>
                               <div class="text-end">
                                   <span class="badge rounded-pill {{ $research->publication_status === 'published' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                                       {{ ucfirst($research->publication_status) }}
                                   </span>
                                   <div class="text-muted small mt-2">{{ $research->downloads_count }} downloads</div>
                               </div>
                           </div>
                       </div>
                   @empty
                       <div class="px-6 py-8 text-center text-muted">No research activity found yet.</div>
                   @endforelse
               </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const rolesChart = document.getElementById('rolesChart');

    if (rolesChart) {
        const ctx = rolesChart.getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
               labels: @json($roleLabels),
               datasets: [{
                   data: @json($roleCounts),
                   backgroundColor: ['#0d6efd', '#198754', '#ffc107', '#dc3545', '#6f42c1', '#6c757d', '#0dcaf0'],
                   borderColor: '#fff',
                   borderWidth: 2,
               }]
            },
            options: {
               responsive: true,
               maintainAspectRatio: false,
               cutout: '70%',
               plugins: {
                   legend: { display: false },
                   tooltip: { enabled: true },
               },
            },
        });
    }

    function updateDigitalClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('digitalClock').textContent = `${hours}:${minutes}:${seconds}`;
        document.getElementById('digitalSeconds').textContent = `${seconds} seconds`;

        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('digitalDate').textContent = now.toLocaleDateString(undefined, options);
    }

    setInterval(updateDigitalClock, 1000);
    updateDigitalClock();
</script>
@endpush
@endsection
