@extends('layouts.app')
@section('content')

<h2 class="my-3">Search Results for <i style="color: blue;">{{ $searchStr }}</i></h2>
<hr>
<h4>Competencies</h4>
@if($competencies->count() > 0)
<table class="table table-hover my-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description/Comments</th>
            <th>Questions</th>
            <th>Levels</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($competencies as $competency)
        <tr>
            <td>{{ $competency->name }}</td>
            <td>{{ $competency->description }}</td>
            <td>
                <a href="questions/map?id={{ $competency->id }}"><i class="bi bi-question-circle fa-2x"></i></a>
            </td>
            <td>
                <a href="levels/showlevels/{{ $competency->id }}"><i class="bi bi-bar-chart-fill fa-2x"></i></a>
            </td>
            <td>
                <a href="questions/map?id={{ $competency->id }}"><i class="bi bi-pencil-fill fa-2x"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <div class="alert alert-warning">No competencies found for that search term</div>
@endif

<h4 class="my-3">Questions</h4>
@if($questions->count() > 0)
<table class="table table-hover">
    <tbody>
        <thead>
            <tr>
                <th>Question</th>
                <th>Comments</th>
                <th>Competency</th>
                <th>Levels</th>
            </tr>
        </thead>

        @foreach($questions as $question)
        <tr>
            <td>{{ $question->question_name }}</td>
            <td>{{ $question->comments }}</td>
            <td>{{ $question->competency_name }}</td>
            <td>
                <a href="{{ route('questions.edit', $question->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <div class="alert alert-warning">No questions found for that search term</div>
@endif
@endsection