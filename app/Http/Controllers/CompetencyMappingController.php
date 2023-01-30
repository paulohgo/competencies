<?php

namespace App\Http\Controllers;

use App\Models\CompetencyMapping;
use App\Models\Level;
use Illuminate\Http\Request;

class CompetencyMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompetencyMapping  $competencyMapping
     * @return \Illuminate\Http\Response
     */
    public function show(CompetencyMapping $competencyMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompetencyMapping  $competencyMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(CompetencyMapping $competencyMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompetencyMapping  $competencyMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompetencyMapping $competencyMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetencyMapping  $competencyMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompetencyMapping $competencyMapping)
    {
        //
    }

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
