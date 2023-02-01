<?php

namespace App\Http\Controllers;

use App\Models\CompetencyMapping;
use App\Models\Level;
use Illuminate\Http\Request;

class CompetencyMappingController extends Controller
{
    public function map()
    {
        $levels = Level::all();
        return view('competencies.map', compact('levels'));
    }
    

    public function mapCompetency(Request $req)
    {

        $data = [
            'level_id' => $req['level'],
            'competency_id' => $req['competency'],
        ];
        
        CompetencyMapping::create($data);
        $records = getAllCompetencyMappings($req['level']);
        return($records);
    }

    public function removeMapping(Request $req)
    {
        $result = CompetencyMapping::destroy($req['mapId']);
        $response = ($result) ? (getAllCompetencyMappings($req['level'])) : (null);
        return ($response);
    }
}
