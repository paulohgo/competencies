<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

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

}
