<?php
use App\Models\Competency;
use App\Models\CompetencyMapping;
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
    ->get();
    return $records;
}





?>