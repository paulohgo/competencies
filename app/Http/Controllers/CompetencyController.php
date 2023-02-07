<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Question;
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

    public function search(Request $req)
    {
        $searchStr = $req['search'];
        $str = '%' . $req['search'] . '%';

        $competencies = Competency::where('name', 'like', $str)
        ->orWhere('description', 'like', $str)
        ->get();
        //dd($competencies);

        $questions = DB::table('questions as q')
        ->select('q.id', 'q.name as question_name', 'q.comments', 'c.name as competency_name', 'c.id as competency_id')
        ->leftJoin('question_mappings as qm', 'q.id', '=', 'qm.question_id')
        ->leftJoin('competencies as c', 'c.id', '=', 'qm.competency_id')
        ->where('q.name', 'like', $str)
        ->orWhere('q.comments', 'like', $str)
        ->get();

        /*$questions = Question::where('name', 'like', $str)
        ->orWhere('comments', 'like', $str)
        ->get();*/

        $levels = DB::table('competency_mappings as cm')
            ->select('l.code', 'l.description', 'c.name as competency_name')
            ->join('competencies as c', 'c.id', '=', 'cm.competency_id')
            ->join('levels as l', 'l.id', '=', 'cm.level_id')
            ->where('c.name', 'like', $str)
            ->orWhere('c.description', 'like', $str)
            ->orderBy('l.code', 'asc')
            ->get();

        return view('competencies.search', compact('competencies', 'questions', 'levels', 'str', 'searchStr'));
    }

}
