 <!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')
@include('layouts.toastr')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Edit User</h3>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $user->name) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $user->email) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>

                     <select name="role" class="form-select">

    <option value="admin"
        {{ $user->role == 'admin' ? 'selected' : '' }}>
        Admin
    </option>

    <option value="user"
        {{ $user->role == 'user' ? 'selected' : '' }}>
        User
    </option>

    <option value="student"
        {{ $user->role == 'student' ? 'selected' : '' }}>
        Student
    </option>

</select>
                </div>

                <a href="{{ route('users.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    Update User
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>