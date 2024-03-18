<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Posts</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('employees.index') }}>CRUDPosts</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('employees.create') }}>Add Post</a>
            </div>
        </div>
    </div>
</nav>
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
        @foreach ($employees as $employee)
            <tr>

                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->first_name}}</td>
                <td>{{ $employee->last_name}}</td>
                <td>{{ $employee->email}}</td>
                <td>{{ $employee->phone_number}}</td>
                <td>{{ $employee->position}}</td>



                <td>
                    <a href="{{ route('employees.edit', $employee->employee_id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->employee_id) }}" method="post" style="display: inline;">
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


</body>
</html>
