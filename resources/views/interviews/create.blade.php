@extends('layouts.app')
@section('content')

<h2 class="my-3">Set up interview</h2>
<form id="editForm" action="{{ route('interviews.store') }}" method="POST">
    @csrf
    <label for="requisition" class="my-2">Requisition</label>
    <input class="form-control w-50" type="text" id="requisition" name="requisition">

    <label for="level" class="my-2">Level</label>
    <select class="form-control w-50 my-2" id="level" name="level">
        <option disabled selected>Select a level</option>    
        @foreach ($levels as $level)
        <option value="{{$level->id}}">{{$level->code}}</option>
        @endforeach
    </select>
    
    <label for="name" class="my-2">Candidate</label>
    <input class="form-control w-50" type="text" id="candidate_name" name="candidate_name">

    <label for="name" class="my-2">Interview date</label>
    <input class="form-control w-50" type="date" id="interview_date" name="interview_date">

    <label for="notes" class="my-2">Notes
    <textarea class="form-control" cols="80" rows="5" id="notes" name="notes"></textarea>
    <button class="btn btn-primary my-2" type="submit">Save</button>
</form>
@endsection