<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Research\ResearchStoreRequest;
use App\Http\Requests\Admin\Research\ResearchUpdateRequest;
use App\Models\Campus;
use App\Models\Department;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\HasPermissions;

class ResearchController extends Controller
{
    //  use HasPermissions;
    //  use HasPermissions;

    // protected $permissions = [
    //     'research_create' => ['store'],
    //     'research_view'   => ['view'],
    //     'research_delete' => ['destroy'],
    // ];

    // public function __construct()
    // {
    //     // ⚡ Call the trait method here!
    //     $this->applyPermissions();
    // }
    // public function __construct()
    // {
    //     // // Protect methods using Spatie permissions
    //     $this->middleware('permission:research_create')->only('store');
    //     $this->middleware('permission:research_view')->only('view');
    //     $this->middleware('permission:research_delete')->only('delete');
    // }

    /**
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
        $campuses = Campus::all();
        return view('admin.research.index', compact('campuses'));
    }

    /**
     * Store a newly created research entry
     */
    public function store(ResearchStoreRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $data = $validatedData;

            // Handle Abstract File
            if ($request->hasFile('abstract_document')) {
                $abstract_file = $request->file('abstract_document');
                // Store in 'public/abstract-file' and save relative path
                $abstract_path = $abstract_file->store('abstract-file', 'public');
                $data['abstract_path'] = $abstract_path;
                $data['abstract_file_name'] = $abstract_file->getClientOriginalName();
            }

            // Handle Full Research Paper
            if ($request->hasFile('full_paper_file')) {
                $paper_file = $request->file('full_paper_file');
                $paper_path = $paper_file->store('complete-research-file', 'public');
                $data['research_paper_path'] = $paper_path;
                $data['research_paper_file_name'] = $paper_file->getClientOriginalName();
            }

            $research = Research::create($data);

            return response()->json([
                'message' => 'Research created successfully.',
                'research' => $research
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create research.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Fetch researches for display
     */
    public function fetch(Request $request)
    {
        $user = auth()->user();
        $query = Research::with('campus', 'department');

        // If the user is NOT super-admin, restrict to their campus
        if (!$user->hasRole('super-admin')) {
            $query->where('campus_id', $user->campus_id);
        } else {
            // Super-admin can optionally filter by campus
            if ($request->campus_id) {
                $query->where('campus_id', $request->campus_id);
            }
        }

        // Apply search filter
        if ($request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
            });
        }

        $researches = $query->get();


        if ($researches->count() > 0) {
            $output = '<div class="table-responsive">
                        <table class="table align-middle table-row-bordered table-row-dashed gy-5" id="kt_table_widget_1">
                            <thead>
                                <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                    <th class="w-20px ps-0">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table_widget_1 .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-200px px-0">Research Title</th>
                                    <th class="min-w-200px px-0">School Campus</th>
                                    <th class="min-w-200px px-0">School Department</th>
                                    <th class="min-w-125px">Created At</th>
                                    <th class="text-end pe-2 min-w-70px">Action</th>
                                </tr>
                            </thead>
                            <tbody>';

            foreach ($researches as $research) {
                $output .= '<tr>
                                <td class="p-0">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $research->id . '" />
                                    </div>
                                </td>
                                <td class="p-0"><span class="text-gray-800 fs-5">' . ucfirst($research->title) . '</span></td>
                                <td class="p-0"><span class="text-gray-800 fs-5">' . ucfirst($research->campus->name) . '</span></td>
                                <td class="p-0"><span class="text-gray-800 fs-5">' . ucfirst($research->department->name) . '</span></td>
                                <td><span class="text-gray-800 fs-5 d-block">' . $research->created_at->format('M d, Y') . '</span></td>
                                <td class="pe-0 text-end">
                                    <button class="btn btn-primary btn-sm mt-1 research_view" data-id="' . $research->id . '" data-bs-toggle="modal" data-bs-target="#viewResearchModal">View Details</button>
                                    <button class="btn btn-success btn-sm mt-1 research_edit" data-id="' . $research->id . '" data-bs-toggle="modal" data-bs-target="#editResearchModal">Edit Details</button>
                                    <button class="btn btn-danger btn-sm mt-1 research_delete" data-id="' . $research->id . '">Delete</button>
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
                                    <div class="fw-bold mt-2"><span class="text-gray-400 fw-bold mt-2 fs-6">No record found.</span></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>';
        }
    }

    /**
     * View a research record
     */
    public function view(Request $request)
    {
        $data = Research::with('campus', 'department')->findOrFail($request->id);
        return response()->json($data);
    }

    /**
     * View the PDF Abstract
     */
    public function view_abstract_pdf($id)
    {
        $research = Research::findOrFail($id);
        $path = $research->abstract_path;

        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->response($path);
        }

        return abort(404, 'Abstract file not found.');
    }

    /**
     * View the full research PDF
     */
    public function view_research_pdf($id)
    {
        $research = Research::findOrFail($id);
        $path = $research->research_paper_path;

        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->response($path);
        }

        return abort(404, 'Research paper file not found.');
    }
    /**
     * Fetch a research record for editing
     */
    public function edit($id)
    {
        $research = Research::with('campus', 'department')->findOrFail($id);
        return response()->json($research);
    }

    /**
     * Update an existing research record
     */
    public function update(ResearchUpdateRequest $request, $id)
    {
        $research = Research::findOrFail($id);

        // Get validated data
        $data = $request->validated();

        // Handle Abstract File
        if ($request->hasFile('abstract_document')) {

            if ($research->abstract_path && Storage::disk('public')->exists($research->abstract_path)) {
                Storage::disk('public')->delete($research->abstract_path);
            }

            $file = $request->file('abstract_document');
            $path = $file->store('abstract-file', 'public');

            $data['abstract_path'] = $path;
            $data['abstract_file_name'] = $file->getClientOriginalName();
        }

        // Handle Full Paper
        if ($request->hasFile('full_paper_file')) {

            if ($research->research_paper_path && Storage::disk('public')->exists($research->research_paper_path)) {
                Storage::disk('public')->delete($research->research_paper_path);
            }

            $file = $request->file('full_paper_file');
            $path = $file->store('complete-research-file', 'public');

            $data['research_paper_path'] = $path;
            $data['research_paper_file_name'] = $file->getClientOriginalName();
        }

        $research->update($data);

        return response()->json([
            'message' => 'Research updated successfully.',
            'research' => $research
        ]);
    }

    public function destroy(Request $request)
{
    $research = Research::findorFail($request->id);

    if (!$research) {
        return response()->json([
            'error' => 'Delete failed',
            'message' => 'Research record not found.'
        ], 404);
    }

    // Delete abstract file
    if ($research->abstract_path && Storage::disk('public')->exists($research->abstract_path)) {
        Storage::disk('public')->delete($research->abstract_path);
    }

    // Delete full paper
    if ($research->research_paper_path && Storage::disk('public')->exists($research->research_paper_path)) {
        Storage::disk('public')->delete($research->research_paper_path);
    }

    $research->delete();

    return response()->json([
        'message' => 'Research deleted successfully.'
    ]);
}
}
