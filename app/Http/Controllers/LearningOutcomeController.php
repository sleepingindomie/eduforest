<?php

namespace App\Http\Controllers;

use App\Models\LearningOutcome;
use App\Models\Course;
use Illuminate\Http\Request;

class LearningOutcomeController extends Controller
{
    public function index()
    {
        $learningOutcomes = LearningOutcome::with('course')->get();
        return view('learning_outcomes.index', compact('learningOutcomes'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('learning_outcomes.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'outcome' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        LearningOutcome::create($request->all());
        return redirect()->route('learning_outcomes.index')->with('success', 'Capaian pembelajaran berhasil ditambahkan');
    }

    public function edit(LearningOutcome $learningOutcome)
    {
        $courses = Course::all();
        return view('learning_outcomes.edit', compact('learningOutcome', 'courses'));
    }

    public function update(Request $request, LearningOutcome $learningOutcome)
    {
        $request->validate([
            'outcome' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $learningOutcome->update($request->all());
        return redirect()->route('learning_outcomes.index')->with('success', 'Capaian pembelajaran berhasil diperbarui');
    }

    public function destroy(LearningOutcome $learningOutcome)
    {
        $learningOutcome->delete();
        return redirect()->route('learning_outcomes.index')->with('success', 'Capaian pembelajaran berhasil dihapus');
    }
}
