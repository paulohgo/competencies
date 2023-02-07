<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Competency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('levels.index', compact('levels'));
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'description' => 'required',
        ]);

        Level::create($validatedData);

        return redirect()->route('levels.index');
    }

    public function edit(Level $level)
    {
        return view('levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'description' => 'required',
        ]);

        $level->update($validatedData);

        return redirect()->route('levels.index');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index');
    }

    public function list()
    {
        $levels = Level::all();
        return response()->json($levels);
    }

    public function showLevels($competency)
    {
        $competencyName = Competency::select('name')
        ->where('id', $competency)
        ->first();


        $levels = DB::table('levels as l')
        ->select('l.code as level_code', 'f.name as factor_name', 'c.name as competency_name')
        ->join('competency_mappings as cm', 'cm.level_id', '=', 'l.id')
        ->join('competencies as c', 'c.id', '=', 'cm.competency_id')
        ->join('factors as f', 'f.id', '=', 'c.factor_id')
        ->where('cm.competency_id', $competency)
        ->orderBy('l.code')
        ->get();

        return view('levels.showlevels', compact('levels', 'competencyName'));
    }

}
