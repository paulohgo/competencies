@extends('layouts.app')
@section('content')


<h2>Levels</h2>
@include('alert.alert')

<a class="btn btn-primary btn-sm" href="{{ route('levels.create') }}">New Level</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($levels as $level)
            <tr>
                <td>{{ $level->id }}</td>
                <td>{{ $level->code }}</td>
                <td>{{ $level->description }}</td>
                <td>
                    <a href="{{ route('levels.edit', $level) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('levels.destroy', $level) }}" method="POST">
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