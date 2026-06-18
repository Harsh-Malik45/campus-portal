<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Name</label>

            <input type="text"
                   class="form-control"
                   value="{{ $user->name }}"
                   readonly>

        </div>

        <div class="mb-3">

            <label>Role</label>

            <select name="role"
                    class="form-control">

                <option value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

                <option value="user"
                    {{ $user->role == 'user' ? 'selected' : '' }}>
                    User
                </option>

            </select>

        </div>

        <button class="btn btn-primary">
            Update Role
        </button>

    </form>

</div>

</body>
</html>