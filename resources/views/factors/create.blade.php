@extends('layouts.app')
@section('content')
<h2>New Factor</h2>

<form action="{{ route('factors.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input class="form-control w-50" type="text" id="name" name="name">
    <label for="description">Description
    <textarea class="form-control" cols="80" rows="5" id="description" name="description"></textarea>
    <button class="btn btn-primary my-2" type="submit">Save</button>
</form>
@endsection