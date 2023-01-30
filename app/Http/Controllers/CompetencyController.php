<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\CompetencyMapping;
use App\Models\Level;
use App\Models\Factor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencies = getCompetencies();
        
        return view('competencies.index')->with(compact('competencies'));
    }

    public function create()
    {
        $factors = Factor::all();
        return view('competencies.create')->with(compact('factors'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'factor_id' => 'required',
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

    
    public function list(Request $req)
    {
        $level = $req['level'];
        $competencies = listCompetenciesByLevel($level);
        $records = getAllCompetencyMappings($level);
        return response()->json([$competencies, $records]);
    }

    public function levels()
    {
        $levels = Level::all();
    }

}
