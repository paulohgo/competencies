@extends('layouts.app')
@section('content')

<h2>Edit Factor</h2>
<form class="form-control" action="{{ route('factors.update', $factor) }}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <label for="code">Name:</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ $factor->name }}">
    <label for="description">Description:</label>
    <textarea class="form-control" cols="80" rows="5" id="description" name="description">{{ $factor->description }}</textarea>
    <button class="btn btn-primary my-2" type="submit">Update</button>
</form>

@endsection