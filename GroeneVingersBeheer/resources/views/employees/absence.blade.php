@extends('layouts.layout')

@section('content')

    <form action="{{ route('employee.absence') }}" method="POST">
        @csrf
        <label for="absence_type">Absence Type:</label>
        <select name="absence_type" id="absence_type">
            @foreach($absenceTypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="start_time">Start Time:</label>
        <input type="datetime-local" name="start_time" id="start_time">
        <br>
        <label for="finish_time">Finish Time:</label>
        <input type="datetime-local" name="finish_time" id="finish_time">
        <br>
        <button type="submit">Submit</button>
    </form>

@endsection
