@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('management.index') }}>GroeneVingers</a>
        <div class="justify-end ">
            <div class="col ">
                <button class="btn btn-sm btn-success" id="myBtn" >Add Employee</button>
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

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a Post</h3>
                <form action="{{ route('management.store') }}" method="post">
                    @csrf
                    <!-- Hidden inputs for 'id' and 'role_id' -->
                    <input type="hidden" name="id" value="1"> <!-- Assuming 'id' is predefined or auto-generated -->
                    <input type="hidden" name="role_id" value="1"> <!-- Assuming 'role_id' is predefined -->

                    <!-- Name field -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Id field -->
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>

                    <!-- Email field -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Password field -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>


@endsection
