@extends('layouts.app')
@section('content')
<h2>Factors</h2>
<a class="btn btn-primary btn-sm" href="{{ route('factors.create') }}">+ New Factor</a>
<table class="table table-hover">
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
        @foreach($factors as $factor)
            <tr>
                <td>{{ $factor->id }}</td>
                <td>{{ $factor->name }}</td>
                <td>{{ $factor->description }}</td>
                <td>
                    <a href="{{ route('factors.edit', $factor) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('factors.destroy', $factor) }}" method="POST">
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