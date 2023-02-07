@extends('layouts.app')
@section('content')
<h2 class="my-3">Levels for competency <i style="color: blue;">{{ $competencyName->name }}</i></h2>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Level</th>
            <th>Factor</th>
            <th>Competency</th>
        </tr>
    </thead>
    <tbody>
        @foreach($levels as $level)
            <tr>
                <td>{{ $level->level_code }}</td>
                <td>{{ $level->factor_name }}</td>
                <td>{{ $level->competency_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection