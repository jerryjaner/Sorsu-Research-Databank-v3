<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class AdminAccountProfileController extends Controller
{
    /**
     * ===============================
     * SHARED STATS
     * ===============================
     */
     /**
     * ===============================
     * SHARED STATS
     * ===============================
     */
    private function getProfileStats($user)
    {
        $managedUsersCount = $user->hasRole('super-admin')
            ? User::count()
            : User::where('campus_id', $user->campus_id)->count();

        $activeSessions = DB::table('sessions')
            ->when(!$user->hasRole('super-admin'), function ($q) use ($user) {
                $q->join('users', 'sessions.user_id', '=', 'users.id')
                  ->where('users.campus_id', $user->campus_id);
            })
            ->where('last_activity', '>=', now()->subMinutes(15)->timestamp)
            ->count();

        $profile = $user->profile;

        $fields = [
            $user->name,
            $user->email,
            optional($profile)->phone,
            optional($profile)->address,
            optional($profile)->profile_picture,
        ];

        $filled = collect($fields)->filter()->count();
        $profileCompletion = round(($filled / count($fields)) * 100);

        return compact('managedUsersCount', 'activeSessions', 'profileCompletion');
    }

    /**
     * ===============================
     * OVERVIEW
     * ===============================
     */
    public function overviewIndex()
    {
        $stats = $this->getProfileStats(Auth::user());
        return view('admin.profile.overview', $stats);
    }

    /**
     * ===============================
     * SETTINGS
     * ===============================
     */
    public function settingsIndex()
    {
        $stats = $this->getProfileStats(Auth::user());
        return view('admin.profile.settings', $stats);
    }

    /**
     * ===============================
     * SECURITY (LOGIN SESSIONS)
     * ===============================
     */
    public function securityIndex()
    {
        $user = Auth::user();
        $stats = $this->getProfileStats($user);

        // Hours filter (default 1)
        $hours = request('hours', 1);

        // Base query
        $query = DB::table('sessions')
            ->leftJoin('users', 'sessions.user_id', '=', 'users.id')
            ->select(
                'sessions.id',
                'sessions.user_id',
                'sessions.ip_address',
                'sessions.user_agent',
                'sessions.last_activity',
                'users.name as user_name',
                'users.campus_id'
            )
            ->where('sessions.last_activity', '>=', now()->subHours($hours)->timestamp)
            ->orderByDesc('sessions.last_activity');

        // Filter campus if not super-admin
        if (!$user->hasRole('super-admin')) {
            $query->where('users.campus_id', $user->campus_id);
        }

        // Pagination
        $rawSessions = $query->paginate(10)->withQueryString();

        // Load related users
        $userIds = $rawSessions->pluck('user_id')->filter()->unique();
        $users = User::with(['roles', 'campus'])
            ->whereIn('id', $userIds)
            ->get()
            ->keyBy('id');

        $agent = new Agent();

        $roleLabels = [
            'super-admin' => 'Super Admin',
            'bulan-admin' => 'Bulan Admin',
            'sorsogon-admin' => 'Sorsogon Admin',
            'castilla-admin' => 'Castilla Admin',
            'magallanes-admin' => 'Magallanes Admin',
            'graduate-admin' => 'Graduate Admin',
            'student' => 'Student',
        ];

        // Transform sessions inside paginator
        $rawSessions->getCollection()->transform(function ($session) use ($agent, $users, $roleLabels) {
            $agent->setUserAgent($session->user_agent);

            $userModel = $users[$session->user_id] ?? null;
            $roleName = $userModel?->roles->first()?->name;

            return (object)[
                'id' => $session->id,
                'name' => $userModel?->name ?? 'Guest',
                'campus' => $userModel?->campus?->name ?? 'All Campuses',
                'role' => $roleLabels[$roleName] ?? $roleName ?? 'N/A',
                'device' => $agent->browser() . ' - ' . $agent->platform(),
                'ip_address' => $session->ip_address ?? 'N/A',
                'last_activity' => $session->last_activity,
                'time' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                'is_current' => $session->id === session()->getId(),
            ];
        });

        return view('admin.profile.security', $stats + compact('rawSessions', 'hours'));
    }

    /**
     * ===============================
     * UPDATE PROFILE
     * ===============================
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
            'password' => $request->filled('password')
                ? ['required','string','min:8','confirmed']
                : 'nullable',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->filled('password')
                    ? Hash::make($request->password)
                    : $user->password,
            ]);

            $profileData = [
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            if ($request->hasFile('profile_picture')) {
                $file = $request->file('profile_picture');
                $filename = time().'_'.$file->getClientOriginalName();

                $file->storeAs('profile-picture/images', $filename, 'public');

                if ($user->profile?->profile_picture) {
                    Storage::disk('public')
                        ->delete('profile-picture/images/'.$user->profile->profile_picture);
                }

                $profileData['profile_picture'] = $filename;
            }

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                $profileData
            );

            DB::commit();

            return back()->with([
                'message' => 'Profile updated successfully',
                'alert-type' => 'success'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with([
                'message' => 'Error: '.$e->getMessage(),
                'alert-type' => 'error'
            ]);
        }
    }
}
