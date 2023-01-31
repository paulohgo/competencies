@extends('layouts.app')
@section('content')
<h2>Questions</h2>
<a class="btn btn-primary btn-sm my-2" href="{{ route('questions.create') }}">+ New Question</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Comments</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td>{{ $question->name }}</td>
                <td>{{ $question->comments }}</td>
                <td>
                    <a href="{{ route('questions.edit', $question) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('questions.destroy', $question) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection