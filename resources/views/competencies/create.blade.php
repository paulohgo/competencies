@extends('layouts.app')
@section('content')
<h2>New Competency</h2>
<form action="{{ route('competencies.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" class="form-control w-50" id="name" name="name">
    <label for="description">Description:</label>
    <textarea class="form-control" cols="80" rows="5" id="description" name="description"></textarea>
    <button class="btn btn-primary my-2" type="submit">Save</button>
</form>
@endsection