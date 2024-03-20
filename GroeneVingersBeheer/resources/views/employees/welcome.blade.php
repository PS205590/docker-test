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
        <a class="navbar-brand h1" href={{ route('management.index') }}>CRUDPosts</a>
        <div class="justify-end ">
            <div class="col ">
                <a class="btn btn-sm btn-success" href={{ route('management.create') }}>Add Post</a>
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

        </tbody>
    </table>
</div>


</body>
</html>
