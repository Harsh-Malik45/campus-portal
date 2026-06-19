 <!DOCTYPE html>
<html>
<head>
    <title>Create Notice</title>
</head>
<body>

 <body>

@include('layouts.navbar')

 
<h1>Create Notice</h1>

<form action="{{ route('notices.store') }}" method="POST">

    @csrf

    <div>
        <label>Title</label>
        <input type="text" name="title">
    </div>

    <br>

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <br>

    <button type="submit">
        Save Notice
    </button>

</form>

</body>
</html>