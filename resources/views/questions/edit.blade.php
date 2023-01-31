@extends('layouts.app')
@section('content')

<h2>Edit Question</h2>
<form class="form-control" action="{{ route('questions.update', $question) }}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <label for="code">Name:</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ $question->name }}">
    <label for="description">Comments:</label>
    <textarea class="form-control" cols="80" rows="5" id="comments" name="comments">{{ $question->comments }}</textarea>
    <button class="btn btn-primary my-2" type="submit">Update</button>
</form>

@endsection