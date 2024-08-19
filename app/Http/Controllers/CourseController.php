<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $userId = Auth::id();  // Ambil ID user yang sedang login

        // Ambil daftar mata kuliah yang diambil oleh user
        $courses = Course::where('user_id', $userId)->with('subject')->get();

        // Ambil ID semua mata kuliah yang sudah diambil oleh user
        $takenSubjectIds = $courses->pluck('subject_id')->toArray();

        // Ambil semua mata kuliah yang belum diambil oleh user
        $subjects = Subject::whereNotIn('id', $takenSubjectIds)->get();

        $isApproved = $courses->first() ? $courses->first()->isApproved : false;  // Periksa apakah KRS sudah disetujui

        return view('courses', compact('courses', 'subjects', 'isApproved'));
    }

    public function create()
    {
        $subjects = Subject::all(); // Ambil semua subject
        return view('courses.create', compact('subjects'));  // Mengarah ke form untuk menambah course baru
    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        // Cek apakah mata kuliah sudah ada di courses user tersebut
        $existingCourse = Course::where('user_id', $userId)
            ->where('subject_id', $request->subject_id)
            ->first();

        if ($existingCourse) {
            return response()->json(['success' => false, 'message' => 'Mata kuliah sudah ada di daftar Anda.']);
        }

        // Ambil subject yang ingin ditambahkan
        $subjectToAdd = Subject::find($request->subject_id);

        // Cek apakah ada bentrok jadwal dengan mata kuliah yang sudah diambil
        $conflictingCourse = Course::where('user_id', $userId)
            ->whereHas('subject', function($query) use ($subjectToAdd) {
                $query->where('hari', $subjectToAdd->hari)
                      ->where('pukul', $subjectToAdd->pukul);
            })
            ->first();

        if ($conflictingCourse) {
            return response()->json(['success' => false, 'message' => 'Jadwal bentrok dengan mata kuliah lain.']);
        }

        // Tambah mata kuliah ke tabel courses
        Course::create([
            'user_id' => $userId,
            'subject_id' => $request->subject_id,
            'isApproved' => false  // Set default false
        ]);

        return response()->json(['success' => true, 'message' => 'Mata kuliah berhasil ditambahkan.']);
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $subjects = Subject::all(); // Ambil semua subject untuk keperluan editing

        return view('courses.edit', compact('course', 'subjects'));  // Mengarah ke view untuk mengedit course
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->update($request->all());

        return redirect()->route('courses.index');  // Mengarah ke rute yang benar
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('courses.index');  // Mengarah ke rute yang benar
    }

    public function approve($id)
    {
        $course = Course::findOrFail($id);
        $course->is_approved = true; // Menyetujui KRS
        $course->save();

        return redirect()->route('courses.index')->with('success', 'KRS disetujui.');
    }
}
