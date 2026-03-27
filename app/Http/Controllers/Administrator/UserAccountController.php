<?php

namespace App\Http\Controllers\Administrator;

use App\Concerns\SendMailNotifier;
use App\Concerns\UpdateMailNotifier;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Profile;
use App\Models\User;
use App\Traits\HasPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserAccountController extends Controller
{
    use HasPermissions;

    protected $permissions = [
       // User management
        'user_store'      => ['store'],
        'user_create'     => ['create'],
        'user_update'     => ['update'],
        'user_edit'       => ['edit'],
        'user_view'       => ['view'],
        'user_update'       => ['update'],
        'user_destroy'    => ['destroy'],


    ];

    public function __construct()
    {
        $this->applyPermissions();
    }

    use SendMailNotifier, UpdateMailNotifier;
    /*
        * Get departments based on selected campus (for dynamic dropdown)
    */
    public function getDepartmentsByCampus($campusId)
    {
        $departments = Department::where('campus_id', $campusId)
                        ->get(['id', 'name']);

        return response()->json($departments);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::all();

        $roleLabels = [
            'super-admin' => 'Super Administrator',
            'bulan-admin' => 'Bulan Campus Administrator',
            'sorsogon-admin' => 'Sorsogon Campus Administrator',
            'castilla-admin' => 'Castilla Campus Administrator',
            'magallanes-admin' => 'Magallanes Campus Administrator',
            'graduate-admin' => 'Graduate School Administrator',
            'student' => 'Student',
        ];

        $campuses = Campus::all();

         return view('admin.user-accounts.index', compact('roles', 'roleLabels', 'campuses'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password'     => [
                'required', // optional for update
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/',
            ],
            'role'     => 'required|array', // plural
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string|max:255',
            'campus_id' => 'required|exists:campuses,id',
            'department_id' => 'nullable|exists:departments,id',
        ],
         [
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&).',
            'password.min'   => 'Password must be at least 8 characters.',
            'password.max'   => 'Password may not be greater than 20 characters.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::transaction(function() use ($request) {
            $plainPassword = $request->password;
            // Create user
            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'campus_id'     => $request->campus_id ?? null,
                'department_id' => $request->department_id ?? null,
            ]);

            //  Assign role properly
            if($request->role){
                $user->syncRoles($request->role); // Use singular 'role' here
            }

            // Create profile with phone & address
            Profile::create([
                'user_id' => $user->id,
                'phone'   => $request->phone,
                'address' => $request->address,
            ]);

             $this->SendMailNotifier($user, $plainPassword);
        });

        return response()->json(['status' => 200, 'message' => 'User created successfully']);
    }

    public function fetch()
    {
        $search = request('search');  // search input
        $campus = request('campus');  // campus filter

        $currentUser = auth()->user();

        $users = User::with('profile', 'roles')
            ->when(!$currentUser->hasRole('super-admin'), function($query) use ($currentUser) {
                // Non-super-admin: limit by user's campus
                $query->where('campus_id', $currentUser->campus_id);
            })
            ->when($campus, fn($q) => $q->where('campus_id', $campus))

            ->when($search, function($q) use ($search) {
                    $q->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhereHas('profile', function ($p) use ($search) {
                                $p->where('phone', 'like', "%{$search}%");
                            })
                            ->orWhereHas('roles', function ($r) use ($search) {
                                $r->where('name', 'like', "%{$search}%");
                            });
                    });
                })
            ->get();

        $roleLabels = [
            'super-admin' => 'Super Administrator',
            'bulan-admin' => 'Bulan Campus Administrator',
            'sorsogon-admin' => 'Sorsogon Campus Administrator',
            'castilla-admin' => 'Castilla Campus Administrator',
            'magallanes-admin' => 'Magallanes Campus Administrator',
            'graduate-admin' => 'Graduate School Administrator',
            'student' => 'Student',
        ];
         $i = 1;
        if ($users->count() > 0) {
            $output = '<div class="table-responsive">
                        <table class="table align-middle table-row-bordered table-row-dashed gy-5 all_user_table" id="kt_table_widget_1">
                            <thead>
                                <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                    <th class="min-w-90px px-0">Id</th>
                                    <th class="min-w-150px px-0">Name</th>
                                    <th class="min-w-150px px-0">Email</th>
                                    <th class="min-w-150px px-0">Address</th>
                                    <th class="min-w-150px px-0">Phone</th>
                                    <th class="min-w-150px px-0">Role</th>
                                    <th class="text-end pe-2 min-w-70px">Action</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($users as $user) {
                $roles = $user->getRoleNames()->map(fn($role) => $roleLabels[$role] ?? $role)->implode(', ');

                $output .= '<tr>

                                <td class="p-0">
                                    <span class="text-gray-800 fs-5">' . $i++ . '</span>
                                </td>
                                <td class="p-0">
                                    <span class="text-gray-800 fs-5">' . ucfirst($user->name) . '</span>
                                </td>

                                <td class="p-0">
                                    <span class="text-gray-800 fs-5">' . ucfirst($user->email) . '</span>
                                </td>
                                <td class="p-0">
                                    <span class="text-gray-800 fs-5">' . ucfirst($user->profile->address) . '</span>
                                </td>
                                <td class="p-0">
                                    <span class="text-gray-800 fs-5">' . $user->profile->phone . '</span>
                                </td>

                                <td class="p-0">
                                    <span class="text-gray-800 fs-5">' . ($roles ?: 'No Role') . '</span>
                                </td>



                                <td class="pe-0 text-end">
                                    <button class="btn btn-primary btn-sm mt-1 user_edit" data-id="' . $user->id . '">Edit</button>
                                    <button class="btn btn-danger btn-sm mt-1 user_delete" data-id="' . $user->id . '">Delete</button>
                                </td>
                            </tr>';
            }

            $output .= '</tbody></table></div>';
            return $output;
        }

        return '<table class="table align-middle table-row-bordered table-row-dashed gy-5">
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="fas fa-search fa-3x text-muted mb-2"></i>
                                <div class="fw-bold mt-2">
                                    <span class="text-gray-400 fw-bold mt-2 fs-6">No record found in the database.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('profile','roles')->findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    // public function update(Request $request, $id)
    // {
    //     $validator = \Validator::make($request->all(), [
    //         'name'     => 'required|string|max:255',
    //         'email'    => 'required|email|unique:users,email,' . $id,
    //         'password' => 'nullable|string|min:6',
    //         'role'     => 'required|array', // plural
    //         'phone'    => 'required|string|max:20',
    //         'address'  => 'required|string|max:255',
    //         'campus_id' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 422,
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }

    //     DB::transaction(function() use ($request, $id) {
    //         $user = User::findOrFail($id);
    //         $user->name  = $request->name;
    //         $user->email = $request->email;
    //         $user->campus_id = $request->campus_id;
    //         $user->department_id = $request->department_id;
    //         if ($request->password) {
    //             $user->password = Hash::make($request->password);
    //         }
    //         $user->save();

    //         // Assign role using Spatie
    //         if ($request->role) {
    //             $user->syncRoles([$request->role]);
    //         }

    //         // Update or create profile
    //         $profileData = [
    //             'phone'   => $request->phone,
    //             'address' => $request->address,
    //         ];
    //         $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);
    //     });

    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'User updated successfully'
    //     ]);
    // }
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $id,
            'password'     => [
                'nullable', // optional for update
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).+$/',
            ],
            'role'       => 'required|array',
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
            'campus_id'  => 'required|exists:campuses,id',
            'department_id' => 'nullable|exists:departments,id',
        ],
        [
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&).',
            'password.min'   => 'Password must be at least 8 characters.',
            'password.max'   => 'Password may not be greater than 20 characters.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        DB::transaction(function() use ($request, $id) {
            $user = User::findOrFail($id);

            // Track if email or password changes
            $emailChanged    = $user->email !== $request->email;
            $passwordChanged = !empty($request->password);

            $plainPassword = $request->password;

            // Update user info
            $user->name          = $request->name;
            $user->email         = $request->email;
            $user->campus_id     = $request->campus_id;
            $user->department_id = $request->department_id;
            if ($passwordChanged) {
                $user->password = Hash::make($plainPassword);
            }
            $user->save();

            // Update roles
            if ($request->role) {
                $user->syncRoles($request->role);
            }

            // Update profile
            $profileData = [
                'phone'   => $request->phone,
                'address' => $request->address,
            ];
            $user->profile()->updateOrCreate(['user_id' => $user->id], $profileData);

            // Send email only if email or password changed
            $this->UpdateMailNotifier($request->all(), $plainPassword, $emailChanged, $passwordChanged);
        });

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully. Email sent if credentials changed.'
        ]);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted successfully'
        ]);
    }
}
