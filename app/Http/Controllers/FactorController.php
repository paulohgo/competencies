<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factors = Factor::all();
        return view('factors.index', compact('factors'));
    }

    public function create()
    {
        return view('factors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        //dd($validatedData);

        Factor::create($validatedData);

        return redirect()->route('factors.index');
    }

    public function edit(Factor $factor)
    {
        return view('factors.edit', compact('factor'));
    }

    public function update(Request $request, Factor $factor)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($factor->update($validatedData)) 
        {
            return redirect()->route('factors.index')->with('success', 'Factor updated!');    
        } 
        else 
        {
            return redirect()->route('factors.index')->with('fail', 'Factor update failed!');    
        }
        $factor->update($validatedData);
    }


    public function destroy(Factor $factor)
    {
        $factor->delete();

        return redirect()->route('factors.index');
    }

}
