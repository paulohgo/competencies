@extends('layouts.app')
@section('content')

<h2 class="my-3">Edit Competency</h2>
<form action="{{ route('competencies.update', $competency) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $competency->name }}">
    <label for="description">Description:</label>
    <textarea class="form-control" cols="80" rows="5" id="description" name="description">{{ $competency->description }}</textarea>
    <button class="btn btn-primary my-2" type="submit">Update</button>
</form>
@endsection