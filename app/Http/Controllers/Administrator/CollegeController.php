<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Department\DepartmentStoreRequest;
use App\Http\Requests\Admin\Department\DepartmentUpdateRequest;
use App\Models\Campus;
use App\Models\Department;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $campuses = Campus::all();
        return view('admin.college.index',compact('campuses'));
    }
    public function fetch(Request $request)
    {
        $query = Department::with('campus');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('campus', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $departments = $query->get();

        if ($departments->count() > 0) {
            $output = '<div class="table-responsive">
                <table class="table align-middle table-row-bordered table-row-dashed gy-5 all_campuses_table" id="kt_table_widget_1">
                    <thead>
                        <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                            <th class="w-20px ps-0">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
                                </div>
                            </th>
                             <th class="min-w-200px px-0">Campus Name</th>
                            <th class="min-w-200px px-0">College Name</th>
                            <th class="min-w-125px">Created At</th>
                            <th class="text-end pe-2 min-w-70px">Action</th>
                        </tr>
                    </thead>
                    <tbody>';

            foreach ($departments as $department) {
                $output .= '<tr>
                    <td class="p-0">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="' . $department->id . '" />
                        </div>
                    </td>
                     <td class="p-0"><span class="text-gray-800 fs-5">' . ucfirst($department->campus->name) . '</span></td>
                    <td class="p-0"><span class="text-gray-800 fs-5">' . ucfirst($department->name) . '</span></td>
                    <td><span class="text-gray-800 fs-5 d-block">' . $department->created_at->format('M d, Y') . '</span></td>
                    <td class="pe-0 text-end">
                        <button class="btn btn-primary btn-sm mt-1 department_edit" data-id="' . $department->id . '">Edit</button>
                        <button class="btn btn-danger btn-sm mt-1 department_delete" data-id="' . $department->id . '">Delete</button>
                    </td>
                </tr>';
            }

            $output .= '</tbody></table></div>';

            return $output;
        } else {
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
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function store(DepartmentStoreRequest $request)
    {
        $validated = $request->validated();
        Department::create(['name' => $validated['name'], 'campus_id' => $validated['campus_id']]);

        return response()->json([
            'status' => 200,
            'message' => 'Department created successfully',

        ]);
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
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
    public function update(DepartmentUpdateRequest $request, string $id)
    {
        $department = Department::findOrFail($id);
        $department->update($request->validated());
        return response()->json($department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Department deleted successfully'
        ]);
    }
}
