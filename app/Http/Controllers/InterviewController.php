<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Level;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = Interview::all();
        return view('interviews.index', compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('interviews.create')->with(compact('levels'));;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'candidate_name' => 'required',
            'requisition' => 'required',
            'level' => 'required',
            'interview_date' => 'required',
        ]);

        Interview::create($validatedData);

        return redirect()->route('interviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(Interview $interview)
    {
        $levelId = $interview->level;
        $levels = Level::all();
        return view('interviews.edit')->with(compact('interview', 'levels', 'levelId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        session()->forget('success', 'fail');
        $validatedData = $request->validate([
            'candidate_name' => 'required',
            'requisition' => 'required',
            'level' => 'required',
            'interview_date' => 'required',
        ]);

        $interview->update($validatedData);

        return redirect()->route('interviews.index')->with('success', 'Interview updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();
        return redirect()->route('interviews.index');
    }
}
