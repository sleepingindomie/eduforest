<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subject', compact('subjects'));
    }

    public function create()
    {
        return view('subject');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer',
            'dosen' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'pukul' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Subject::create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject added successfully.');
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subject', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        $request->validate([
            'kode' => 'required|string|max:255',
            'matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer',
            'dosen' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'pukul' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
