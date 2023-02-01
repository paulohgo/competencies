@extends('layouts.app')
@section('content')
<h2>Full report</h2>
<div class="alert alert-info"> This report provides a mapping of all competencies and questions associated with each level</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Level</th>    
            <th>Factor</th>
            <th>Competency</th>
            <th>Question</th>
        </tr>
    </thead>
    <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->level_code }}</td>
                <td>{{ $record->factor }}</td>
                <td>{{ $record->competency }}</td>
                <td>{{ $record->question }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection