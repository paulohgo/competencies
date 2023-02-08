<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'comments' => 'required',
        ]);

        Question::create($validatedData);

        return redirect()->route('questions.index');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'comments' => 'required',
        ]);

        if ($question->update($validatedData)) 
        {
            return redirect()->route('questions.index')->with('success', 'Question updated!');    
        } 
        else 
        {
            return redirect()->route('questions.index')->with('fail', 'Question update failed!');    
        }
        $question->update($validatedData);
        return redirect()->route('questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }

    public function list(Request $req)
    {
        $competency = $req['competency'];
        $questions = listQuestionsByCompetency($competency);
        $records = getAllQuestionMappings($competency);
        return response()->json([$questions, $records]);
    }
}
