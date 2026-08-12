<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\DownloadResearch;
use App\Models\Research;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $campusMap = [
            'bulan-admin' => 'Sorsogon State University - Bulan Campus',
            'sorsogon-admin' => 'Sorsogon State University - Sorsogon Campus',
            'magallanes-admin' => 'Sorsogon State University - Magallanes Campus',
            'castilla-admin' => 'Sorsogon State University - Castilla Campus',
            'graduate-admin' => 'Sorsogon State University - Graduate Studies',
        ];

        if ($user->hasRole('super-admin')) {
            $campusIds = null;
        } else {
            $campusName = $campusMap[$user->roles->pluck('name')->first()] ?? null;
            $campusIds = $campusName
                ? Campus::where('name', $campusName)->pluck('id')->toArray()
                : [];
        }

        $totalResearch = Research::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))->count();

        $published = Research::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->where('publication_status', 'published')
            ->count();

        $percentage = $totalResearch > 0 ? round(($published / $totalResearch) * 100) : 0;

        $totalDownloads = DownloadResearch::when($campusIds, function ($q) use ($campusIds) {
            if ($campusIds) {
                $q->whereHas('research', fn ($q2) => $q2->whereIn('campus_id', $campusIds));
            }
        })->count();

        $downloadsToday = DownloadResearch::when($campusIds, function ($q) use ($campusIds) {
            $q->whereDate('created_at', Carbon::today())
                ->when($campusIds, fn ($q2) => $q2->whereHas('research', fn ($q3) => $q3->whereIn('campus_id', $campusIds)));
        })->count();

        $researchToday = Research::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->whereDate('created_at', Carbon::today())
            ->count();

        $topResearcher = Research::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->select('author')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('author')
            ->orderByDesc('total')
            ->first();

        $topResearcherName = $topResearcher->author ?? 'N/A';
        $topResearcherCount = $topResearcher->total ?? 0;

        $topResearcherToday = Research::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->whereDate('created_at', Carbon::today())
            ->select('author')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('author')
            ->orderByDesc('total')
            ->first();

        $topResearcherTodayCount = $topResearcherToday->total ?? 0;

        $startOfMonth = Carbon::now()->startOfMonth();
        $newUsersThisMonth = User::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->where('created_at', '>=', $startOfMonth)
            ->count();

        $newUsersToday = User::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->whereDate('created_at', Carbon::today())
            ->count();

        $totalCampuses = $campusIds ? count($campusIds) : Campus::count();
        $avgResearchPerCampus = $totalCampuses > 0 ? round($totalResearch / $totalCampuses, 2) : 0;

        $roles = Role::withCount(['users' => fn ($q) => $campusIds ? $q->whereIn('campus_id', $campusIds) : $q])
            ->get();

        $roleLabels = $roles->pluck('name');
        $roleCounts = $roles->pluck('users_count');

        $topDownloaded = DownloadResearch::with('research')
            ->when($campusIds, function ($q) use ($campusIds) {
                $q->whereHas('research', fn ($q2) => $q2->whereIn('campus_id', $campusIds));
            })
            ->select('research_id')
            ->selectRaw('COUNT(*) as downloads')
            ->groupBy('research_id')
            ->orderByDesc('downloads')
            ->first();

        $topDownloadedTitle = $topDownloaded?->research?->title ?? 'N/A';
        $topDownloadedCount = $topDownloaded?->downloads ?? 0;

        $recentResearches = Research::when($campusIds, fn ($q) => $q->whereIn('campus_id', $campusIds))
            ->withCount('downloads')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalResearch',
            'published',
            'percentage',
            'totalDownloads',
            'researchToday',
            'downloadsToday',
            'topResearcherTodayCount',
            'newUsersToday',
            'topResearcherName',
            'topResearcherCount',
            'newUsersThisMonth',
            'avgResearchPerCampus',
            'roleLabels',
            'roleCounts',
            'topDownloadedTitle',
            'topDownloadedCount',
            'recentResearches',
        ));
    }
}

