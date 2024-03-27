@extends('layouts.layout')


@section('content')
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('management.index') }}>GroeneVingers</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('management.create') }}>Add Employee</a>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <table class="table">
            <thead>
            <tr>
                <th>employee id</th>
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>phone number</th>
                <th>position</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>

                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->email}}</td>



                    <td>
                        <a href="{{ route('management.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('management.destroy', $user->id) }}" method="post"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




@endsection
