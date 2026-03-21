<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Campus\CampusStoreRequest;
use App\Http\Requests\Admin\Campus\CampusUpdateRequest;
use App\Models\Campus;
use Illuminate\Http\Request;


class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.campus.index');
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
    public function store(CampusStoreRequest $request)
    {
        $validated = $request->validated();
        Campus::create(['name' => $validated['name']]);

        return response()->json([
            'status' => 200,
            'message' => 'Campus created successfully',

        ]);
    }

    public function fetch(Request $request)
    {
        $query = Campus::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $campuses = $query->orderBy('name')->get();

        if ($campuses->count() > 0) {
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
                            <th class="min-w-125px">Created At</th>
                            <th class="text-end pe-2 min-w-70px">Action</th>
                        </tr>
                    </thead>
                    <tbody>';

            foreach ($campuses as $campus) {
                $output .= '<tr>
                    <td class="p-0">
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="' . $campus->id . '" />
                        </div>
                    </td>
                    <td class="p-0"><span class="text-gray-800 fs-5">' . ucfirst($campus->name) . '</span></td>
                    <td><span class="text-gray-800 fs-5 d-block">' . $campus->created_at->format('M d, Y') . '</span></td>
                    <td class="pe-0 text-end">
                        <button class="btn btn-primary btn-sm mt-1 campus_edit" data-id="' . $campus->id . '">Edit</button>
                        <button class="btn btn-danger btn-sm mt-1 campus_delete" data-id="' . $campus->id . '">Delete</button>
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $campus = Campus::findOrFail($id);
        return response()->json($campus);
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
    public function update(CampusUpdateRequest $request,  $id)
    {
        $campus = Campus::findOrFail($id);
        $campus->update($request->validated());
        return response()->json($campus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campus = Campus::findOrFail($id);
        $campus->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Campus deleted successfully'
        ]);
    }
}
