@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Add User</h1>
        <form action="{{ route('management.store') }}" method="POST" class="mt-5">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            {{-- <div class="form-group mb-3">
                <label for="role_id">Role</label>
                <input type="number" name="role_id" id="role_id" class="form-control" required>
            </div> --}}
            <div class="mb-3" label for="role_id">Role:</label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ($roleType as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
