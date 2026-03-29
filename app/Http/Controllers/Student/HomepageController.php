<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Department;
use App\Models\DownloadResearch;
use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    // Show initial homepage with no research data
    public function index()
    {
        $campuses = Campus::all();

        // Do NOT load researches initially
        $researches = collect(); // empty collection

        return view('student.homepage.index', compact('researches', 'campuses'));
    }

    // AJAX search/filter
    public function search(Request $request)
    {
       $query = Research::with(['campus']); // removed department

        // Title search
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Campus filter
        if ($request->filled('campus_id')) {
            $query->where('campus_id', $request->campus_id);
        }

        // Completion year filter
        if ($request->filled('completion_year')) {
            $query->where('completion_year', $request->completion_year);
        }

        // If no filters → return empty (your current behavior)
        if (
            !$request->filled('title') &&
            !$request->filled('campus_id') &&
            !$request->filled('completion_year')
        ) {
            return response()->json([
                'data' => [],
                'current_page' => 1,
                'last_page' => 1,
                'total' => 0
            ]);
        }

        $researches = $query->orderBy('created_at', 'desc')->paginate(5);

        return response()->json($researches);
    }

    // Get departments by campus for the dropdown
    public function getStudentDepartmentsByCampus($campusId)
    {
        $departments = Department::where('campus_id', $campusId)->get();
        return response()->json($departments);
    }

    public function downloadAbstract($id)
    {
        $research = Research::findOrFail($id);

        if (!$research->abstract_path) {
            return redirect()->back()->with('error', 'Abstract PDF not available');
        }

        // Use storage disk to get the file
        $disk = 'public'; // the same disk you used to store
        if (!\Storage::disk($disk)->exists($research->abstract_path)) {
            return redirect()->back()->with('error', 'File not found');
        }

        // Log download
        DownloadResearch::create([
            'user_id' => Auth::id(),
            'research_id' => $research->id,
            'created_at' => now(),
        ]);

        return \Storage::disk($disk)->download($research->abstract_path, $research->abstract_file_name);
    }
}
