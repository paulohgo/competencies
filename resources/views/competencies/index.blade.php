@extends('layouts.app')
@section('content')
<h2 class="my-3">Competencies</h2>
<a class="btn btn-primary btn-sm" href="{{ route('competencies.create') }}">+ New Competency</a>
<table class="table table-hover my-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($competencies as $competency)
            <tr>
                <td>{{ $competency->id }}</td>
                <td>{{ $competency->name }}</td>
                <td>{{ $competency->description }}</td>
                <td>
                    <a href="{{ route('competencies.edit', $competency) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('competencies.destroy', $competency) }}" method="POST">
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
