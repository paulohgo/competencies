@extends('layouts.app')
@section('content')
<h2>New Competency</h2>
<form action="{{ route('competencies.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <select class="form-control w-50" id="factor_id" name="factor_id">
        <option disabled selected>Select a factor</option>    
        @foreach ($factors as $factor)
        <option value="{{$factor->id}}">{{$factor->name}}</option>
        @endforeach
    </select>
    <br>
    <label for="name">Name:</label>
    <input type="text" class="form-control w-50" id="name" name="name">
    <br>
    <label for="description">Description:</label>
    <textarea class="form-control" cols="80" rows="5" id="description" name="description"></textarea>
    <button class="btn btn-primary my-2" type="submit">Save</button>
</form>
@endsection