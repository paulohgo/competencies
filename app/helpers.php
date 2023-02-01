<?php
use App\Models\Competency;
use App\Models\CompetencyMapping;
use App\Models\QuestionMapping;
use Illuminate\Support\Facades\DB;


function listCompetenciesByLevel($level)
{
    $query = "SELECT distinct c.id, c.name FROM competencies c
    LEFT JOIN competency_mappings cm ON c.id = cm.competency_id
    WHERE c.id NOT IN (SELECT competency_id 
    FROM competency_mappings WHERE level_id = $level)";
    $competencies = DB::select($query);
    return $competencies;
}

function listQuestionsByCompetency($competency)
{
    $query = "SELECT distinct q.id, q.name FROM questions q
    LEFT JOIN question_mappings qm ON q.id = qm.question_id
    WHERE q.id NOT IN (SELECT question_id 
    FROM question_mappings WHERE competency_id = $competency)";
    $questions = DB::select($query);
    return $questions;
}

function getCompetencies()
{
    /*$competencies = DB::table('competencies as c')
            ->select('f.name as factor_name', 'c.id', 'c.name as competency_name', 'c.description')
            ->join('factors as f', 'c.factor_id', '=', 'f.id')
            ->get();*/

    $query = "SELECT f.name AS factor_name, c.id, c.name AS competency_name, c.description 
    FROM competencies c
    INNER JOIN factors f ON c.factor_id = f.id";
    //$competencies = DB::select($query);
    $competencies = DB::connection('mysql')->select($query);
    //dd($competencies);
    return $competencies;

}


function getFullReport()
{
     $query = "SELECT * from competency
    FROM competencies c
    INNER JOIN factors f ON c.factor_id = f.id";
    //$competencies = DB::select($query);
    $competencies = DB::connection('mysql')->select($query);
    //dd($competencies);
    return $competencies;

}

function getAllCompetencyMappings($level)
{
    $records = CompetencyMapping::select('c.name as competency_name', 'competency_mappings.id as mapping_id', 'f.name as factor_name', 'l.code as level_code')
    ->join('competencies as c', 'c.id', '=', 'competency_mappings.competency_id')
    ->join('levels as l', 'l.id', '=', 'competency_mappings.level_id')
    ->join('factors as f', 'f.id', '=', 'c.factor_id')
    ->where('l.id', '=', $level)
    ->orderBy('f.name', 'asc')
    ->orderBy('c.name', 'asc')
    ->get();
    return $records;
}

function getAllQuestionMappings($competency)
{
    $records = QuestionMapping::select('c.name as competency_name', 'question_mappings.id as mapping_id', 'f.name as factor_name', 'q.name as question')
    ->join('competencies as c', 'c.id', '=', 'question_mappings.competency_id')
    ->join('questions as q', 'q.id', '=', 'question_mappings.question_id')
    ->join('factors as f', 'f.id', '=', 'c.factor_id')
    ->where('c.id', '=', $competency)
    ->orderBy('c.name', 'asc')
    ->orderBy('q.name', 'asc')
    ->get();
    return $records;
}





?>