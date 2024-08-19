<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::with('course')->get();
        return view('assessments.index', compact('assessments'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('assessments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        Assessment::create($request->all());
        return redirect()->route('assessments.index')->with('success', 'Penilaian berhasil ditambahkan');
    }

    public function edit(Assessment $assessment)
    {
        $courses = Course::all();
        return view('assessments.edit', compact('assessment', 'courses'));
    }

    public function update(Request $request, Assessment $assessment)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $assessment->update($request->all());
        return redirect()->route('assessments.index')->with('success', 'Penilaian berhasil diperbarui');
    }

    public function destroy(Assessment $assessment)
    {
        $assessment->delete();
        return redirect()->route('assessments.index')->with('success', 'Penilaian berhasil dihapus');
    }
}
