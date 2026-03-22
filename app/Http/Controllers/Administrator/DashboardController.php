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

        // Define admin roles
        $adminRoles = [
            'super-admin',
            'bulan-admin',
            'sorsogon-admin',
            'castilla-admin',
            'magallanes-admin',
            'graduate-admin'
        ];

        // Define campuses mapping
        $campusMap = [
            'bulan-admin' => 'Sorsogon State University - Bulan Campus',
            'sorsogon-admin' => 'Sorsogon State University - Sorsogon Campus',
            'magallanes-admin' => 'Sorsogon State University - Magallanes Campus',
            'castilla-admin' => 'Sorsogon State University - Castilla Campus',
            'graduate-admin' => 'Sorsogon State University - Graduate Studies Campus'
        ];

        // Determine accessible campus IDs
        if ($user->hasRole('super-admin')) {
            $campusIds = null; // all campuses
        } else {
            $campusName = $campusMap[$user->roles->pluck('name')->first()] ?? null;
            $campusIds = $campusName
                ? Campus::where('name', $campusName)->pluck('id')->toArray()
                : [];
        }

        // Total Research
        $totalResearch = Research::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))->count();

        // Published Research
        $published = Research::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))
            ->where('publication_status', 'published')
            ->count();

        $percentage = $totalResearch > 0 ? round(($published / $totalResearch) * 100) : 0;

        // Total Downloads
        $totalDownloads = DownloadResearch::when($campusIds, function($q) use ($campusIds) {
            if ($campusIds) {
                $q->whereHas('research', fn($q2) => $q2->whereIn('campus_id', $campusIds));
            }
        })->count();

        // Downloads today
        $downloadsToday = DownloadResearch::when($campusIds, function($q) use ($campusIds) {
            $q->whereDate('created_at', Carbon::today())
              ->when($campusIds, fn($q2) => $q2->whereHas('research', fn($q3) => $q3->whereIn('campus_id', $campusIds)));
        })->count();

        // Research submitted today
        $researchToday = Research::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Top Researcher overall
        $topResearcher = Research::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))
            ->select('author')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('author')
            ->orderByDesc('total')
            ->first();

        $topResearcherName = $topResearcher->author ?? 'N/A';
        $topResearcherCount = $topResearcher->total ?? 0;

        // Top Researcher today
        $topResearcherToday = Research::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))
            ->whereDate('created_at', Carbon::today())
            ->select('author')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('author')
            ->orderByDesc('total')
            ->first();

        $topResearcherTodayCount = $topResearcherToday->total ?? 0;

        // New Users this month
        $startOfMonth = Carbon::now()->startOfMonth();
        $newUsersThisMonth = User::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))
            ->where('created_at', '>=', $startOfMonth)
            ->count();

        // New Users today
        $newUsersToday = User::when($campusIds, fn($q) => $q->whereIn('campus_id', $campusIds))
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Average research per campus
        $totalCampuses = $campusIds ? count($campusIds) : Campus::count();
        $avgResearchPerCampus = $totalCampuses > 0 ? round($totalResearch / $totalCampuses, 2) : 0;

        // User roles count
        $roles = Role::withCount(['users' => fn($q) => $campusIds ? $q->whereIn('campus_id', $campusIds) : $q])
            ->get();

        $roleLabels = $roles->pluck('name');
        $roleCounts = $roles->pluck('users_count');

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
            'roleCounts'
        ));
    }
}
