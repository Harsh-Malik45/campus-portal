<!DOCTYPE html>
<html>
<head>
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <body>

@include('layouts.navbar')
@include('layouts.toastr')


<div class="container mt-5">

    <h2>User Management</h2>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)

    <tr>

        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>

         <td>

    <a href="{{ route('users.edit', $user->id) }}"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="{{ route('users.destroy', $user->id) }}"
          method="POST"
          class="d-inline">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm">
            Delete
        </button>

    </form>

</td>

    </tr>

    @endforeach

</table>

</div>

</body>
</html>