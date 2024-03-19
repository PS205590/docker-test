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
            <a class="navbar-brand h1" href={{ route('management.index') }}>GroeneVingers</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('management.create') }}>Add Post</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Update Order</h3>
                <form action="{{ route('management.update', $employee->employee_id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="employee_id">Order Line Number</label>
                        <input type="text" class="form-control" id="employee_id" name="employee_id"
                               value="{{ $employee->employee_id }}" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Product Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ $employee->first_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ $employee->last_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                               value="{{ $employee->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                               value="{{ $employee->phone_number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position"
                               value="{{ $employee->position }}" required>
                    </div>
                    <button type="submit" class="btn mt-3 btn-primary">Update Order</button>
                </form>

            </div>
        </div>
    </div>
</body>
