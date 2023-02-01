<?php

namespace App\Http\Controllers;

use App\Models\QuestionMapping;
use App\Models\Competency;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function map()
    {
        $competencies = Competency::all();
        $questions = Question::all();
        return view('questions.map', compact('competencies', 'questions'));
    }
    

    public function mapQuestion(Request $req)
    {

        $data = [
            'question_id' => $req['question'],
            'competency_id' => $req['competency'],
        ];
        
        QuestionMapping::create($data);
        $records = getAllQuestionMappings($req['competency']);
        return($records);
    }

    public function removeQuestionMapping(Request $req)
    {
        $result = QuestionMapping::destroy($req['mapId']);
        $response = ($result) ? (getAllQuestionMappings($req['competency'])) : (null);
        return ($response);
    }
}

