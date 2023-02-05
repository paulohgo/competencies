@extends('layouts.app')
@section('content')

<h2 class="my-3">Search Results for <i style="color: blue;">{{ $searchStr }}</i></h2>
<hr>
<h3>Competencies</h3>
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
                <a href="competencies/map?id={{ $competency->id }}"><i class="bi bi-bar-chart-fill fa-2x"></i></a>
            </td>
            <td>
                <a href="questions/map?id={{ $competency->id }}"><i class="bi bi-pencil-fill fa-2x"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<h4 class="my-3">Questions</h4>
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
            <td>{{ $question->name }}</td>
            <td>{{ $question->comments }}</td>
            <td>{{ $question->competency_name }}</td>
            <td>
                <a href="{{ route('questions.edit', $question) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection