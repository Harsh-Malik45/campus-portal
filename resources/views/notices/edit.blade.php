<!DOCTYPE html>
<html>
<head>
    <title>Edit Notice</title>
</head>
<body>

<h1>Edit Notice</h1>

<form action="{{ route('notices.update', $notice->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text"
           name="title"
           value="{{ $notice->title }}">

    <br><br>

    <label>Description</label>

    <textarea name="description">{{ $notice->description }}</textarea>

    <br><br>

    <button type="submit">
        Update Notice
    </button>

</form>

</body>
</html>