<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permision\PermissionStoreRequest;
use App\Http\Requests\Admin\Permision\PermissionUpdateRequest;
use App\Traits\HasPermissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
     use HasPermissions;

    protected $permissions = [
       // Permission management
        'permission_store'  => ['store'],
        'permission_create' => ['create'],
        'permission_edit'   => ['edit'],
        'permission_update'   => ['update'],
        'permission_view'   => ['view'],
        'permission_destroy' => ['destroy'],

    ];

    public function __construct()
    {
        $this->applyPermissions();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.permissions.index');
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
    public function store(PermissionStoreRequest $request)
    {
        $validated = $request->validated();
        Permission::create(['name' => $validated['name']]);

        return response()->json([
            'status' => 200,
            'message' => 'Permission created successfully',

        ]);
    }

    public function fetch(Request $request)
    {
        $query = $request->input('search');

        $permissions = Permission::when($query, function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->get();

        if ($permissions->count() > 0) {
            $output = '<div class="table-responsive">
                        <table class="table align-middle table-row-bordered table-row-dashed gy-5 all_permissions_table" id="kt_table_widget_1">
                            <thead>
                                <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                    <th class="w-20px ps-0">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-200px px-0">Permission Name</th>
                                    <th class="min-w-125px">Created At</th>
                                    <th class="text-end pe-2 min-w-70px">Action</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($permissions as $permission) {
                $output .= '<tr>
                                <td class="p-0">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $permission->id . '" />
                                    </div>
                                </td>
                                <td class="p-0"><span class="text-gray-800 fs-5">' . $permission->name . '</span></td>
                                <td><span class="text-gray-800 fs-5 d-block">' . $permission->created_at->format('M d, Y') . '</span></td>
                                <td class="pe-0 text-end">
                                    <button class="btn btn-primary btn-sm mt-1 permission_edit" data-id="' . $permission->id . '">Edit</button>
                                    <button class="btn btn-danger btn-sm mt-1 permission_delete" data-id="' . $permission->id . '">Delete</button>
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
    public function show(string $id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionUpdateRequest $request, string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->validated());
        return response()->json($permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Permission deleted successfully'
        ]);
    }
}
