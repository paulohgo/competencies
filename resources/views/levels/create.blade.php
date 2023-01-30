@extends('layouts.app')
@section('content')

<h2>New Level</h2>
<form id="editForm" action="{{ route('levels.store') }}" method="POST">
    @csrf
    <label for="code">Code:</label>
    <input class="form-control" type="text" id="code" name="code">
    <label for="description">Description:</label>
    <textarea class="form-control" id="description" name="description"></textarea>
    <button class="btn btn-primary my-2" type="submit">Save</button>
</form>
@endsection