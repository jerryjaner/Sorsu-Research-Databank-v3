<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\RolesStoreRequest;
use App\Http\Requests\Admin\Roles\RolesUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // public function __construct()
    // {
    //     // // Protect methods using Spatie permissions
    //     $this->middleware('permission:user_create')->only('store');
    //     $this->middleware('permission:user_delete')->only('destroy');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.roles.index', compact('permissions'));
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
    public function store(RolesStoreRequest $request)
    {
        $validated = $request->validated();
        Role::create(['name' => $request->name]);

        return response()->json([
            'status' => 200,
            'message' => 'Role created successfully',

        ]);
    }

    /**
     * Fetch all roles.
     */
    public function fetch(Request $request)
    {
        $query = $request->input('search');

        $roles = Role::when($query, function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->get();

        $i = 1;

        if ($roles->count() > 0) {
            $output = '<div class="table-responsive">
                        <table class="table align-middle table-row-bordered table-row-dashed gy-5 all_roles_table" id="kt_table_widget_1">
                            <thead>
                                <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                    <th class="w-20px ps-0">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-200px px-0">Role Name</th>
                                    <th class="min-w-125px">Created At</th>
                                    <th class="text-end pe-2 min-w-70px">Action</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($roles as $role) {
                $output .= '<tr>
                                <td class="p-0">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $role->id . '" />
                                    </div>
                                </td>
                                <td class="p-0"><span class="text-gray-800 fs-5">' . $role->name . '</span></td>
                                <td><span class="text-gray-800 fs-5 d-block">' . $role->created_at->format('M d, Y') . '</span></td>
                                <td class="pe-0 text-end">
                                    <button type="button"
                                            class="btn btn-success btn-sm mt-1 role_assign"
                                            data-id="' . $role->id . '"
                                            data-bs-toggle="modal"
                                            data-bs-target="#assignPermissionModal">
                                        Assign Permissions
                                    </button>
                                    <button class="btn btn-primary btn-sm mt-1 role_edit" data-id="' . $role->id . '">Edit</button>
                                    <button class="btn btn-danger btn-sm mt-1 role_delete" data-id="' . $role->id . '">Delete</button>
                                </td>
                            </tr>';
            }

            $output .= '</tbody></table></div>';

            return $output;
        } else {
            return response('
                <table class="table align-middle table-row-bordered table-row-dashed gy-5">
                    <tbody>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <i class="fas fa-search fa-3x text-muted mb-2"></i>
                                <div class="fw-bold mt-2 text-gray-400 fs-6">No record found in the database.</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            ');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(RolesUpdateRequest $request, $id)
    {

        $validated = $request->validated();
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        return response()->json([
            'status' => 200,
            'message' => 'Role updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Role deleted successfully'
        ]);
    }

     // Fetch assigned permissions for a role
    public function getPermissions($roleId)
    {
        $role = Role::findOrFail($roleId);
        return response()->json($role->permissions->pluck('id'));
    }

    // Assign permissions to a role
    public function addPermissionToRole(Request $request, $roleId)
{
    $role = Role::findOrFail($roleId);
    $permissionIds = $request->input('permission', []);
    $permissions = Permission::whereIn('id', $permissionIds)->get();

    $role->syncPermissions($permissions);

    return response()->json([
        'status' => 200,
        'message' => 'Permissions assigned to role successfully'
    ]);
}

}
