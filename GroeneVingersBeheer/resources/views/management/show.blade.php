@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>User Details</h1>
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Role:</strong> {{ $user->role_id }}</li>
        </ul>
        <a href="{{ route('management.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
