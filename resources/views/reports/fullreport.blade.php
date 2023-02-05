@extends('layouts.app')
@section('content')
<h2>Full report</h2>
<div class="alert alert-info"> This report provides a mapping of all competencies and questions associated with each level</div>

<label><b>Narrow down by level</b></label>
<select class="form-control w-50" id="level" name="level" onchange="hideRows()">
    <option disabled selected>Select a level to narrow down</option>
    <option value="all">All levels</option>
@foreach($levels as $level)
    <option value="{{ $level->code }}">{{ $level->code }}</option>
@endforeach
    
</select>
<table class="table table-hover my-5" id="table">
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
            <tr class="{{ $record->level_code }}">
                <td>{{ $record->level_code }}</td>
                <td>{{ $record->factor }}</td>
                <td>{{ $record->competency }}</td>
                <td>{{ $record->question }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
@include('scripts.ajax')
<script async defer>

    $(document).ready( function () {
        $('#table').DataTable();
    } );


    function hideRows()
    {
       unhideTableRows();
       var level = document.getElementById("level").value;
        const rows = document.querySelectorAll("tr");
        for (const row of rows) {
        if (!row.classList.contains(level)) {
            row.style.display = "none";
        }
        }
    }

    function unhideTableRows()
    {
        const rows = document.querySelectorAll("tr");
        for (const row of rows) {
        row.style.display = "";
        }

    }
   
</script>