@extends('layouts.app')
@section('content')

<h2>Edit Level</h2>
<form class="form-control" action="{{ route('levels.update', $level) }}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <label for="code">Code:</label>
    <input class="form-control w-25" type="text" id="code" name="code" value="{{ $level->code }}">
    <label for="description">Description:</label>
    <textarea class="form-control w-25" id="description" name="description">{{ $level->description }}</textarea>
    <button class="btn btn-primary my-2" type="submit">Update</button>
</form>

@endsection