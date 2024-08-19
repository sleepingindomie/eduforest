<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        return view('curriculums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Curriculum::create($request->all());
        return redirect()->route('curriculums.index')->with('success', 'Kurikulum berhasil ditambahkan');
    }

    public function edit(Curriculum $curriculum)
    {
        return view('curriculums.edit', compact('curriculum'));
    }

    public function update(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $curriculum->update($request->all());
        return redirect()->route('curriculums.index')->with('success', 'Kurikulum berhasil diperbarui');
    }

    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();
        return redirect()->route('curriculums.index')->with('success', 'Kurikulum berhasil dihapus');
    }
}
