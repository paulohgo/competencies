@extends('layouts.app')
@section('content')
<h2 class="my-3">Interviews</h2>
@include('alert.alert')
<a class="btn btn-primary btn-sm" href="{{ route('interviews.create') }}">Set up a new interview</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Requisition</th>
            <th>Candidate name</th>
            <th>Level</th>
            <th>Interview date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($interviews as $interview)
            <tr>
                <td>{{ $interview->id }}</td>
                <td>{{ $interview->requisition }}</td>
                <td>{{ $interview->candidate_name }}</td>
                <td>{{ $interview->level }}</td>
                <td>{{ $interview->interview_date }}</td>
                <td>
                    <a href="{{ route('interviews.edit', $interview) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('interviews.destroy', $interview) }}" method="POST">
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