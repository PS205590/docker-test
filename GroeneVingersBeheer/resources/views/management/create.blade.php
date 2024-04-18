@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Add User</h1>
        <form action="{{ route('management.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <input type="number" name="role_id" id="role_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
