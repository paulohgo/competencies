@extends('layouts.app')
@section('content')
<h2>New Question</h2>

<form action="{{ route('questions.store') }}" method="POST">
    @csrf
    <label for="name">Question:</label>
    <input class="form-control w-50" type="text" id="name" name="name">
    <label for="comments">Comments
    <textarea class="form-control" cols="80" rows="5" id="comments" name="comments"></textarea>
    <button class="btn btn-primary my-2" type="submit">Save</button>
</form>
@endsection