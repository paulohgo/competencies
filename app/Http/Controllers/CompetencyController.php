<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencies = Competency::all();
        return view('competencies.index', compact('competencies'));
    }

    public function create()
    {
        return view('competencies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Competency::create($validatedData);

        return redirect()->route('competencies.index');
    }

    public function edit(Competency $competency)
    {
        return view('competencies.edit', compact('competency'));
    }

    public function update(Request $request, Competency $competency)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $competency->update($validatedData);

        return redirect()->route('competencies.index');
    }

    public function destroy(Competency $competency)
    {
        $competency->delete();

        return redirect()->route('competencies.index');
    }

}
