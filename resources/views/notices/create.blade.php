<h1>Create Notice</h1>

<form action="{{ route('notices.store') }}"
      method="POST">

    @csrf

    <label>Title</label>

    <input type="text"
           name="title">

    <br><br>

    <label>Description</label>

    <textarea name="description"></textarea>

    <br><br>

    <button type="submit">
        Save
    </button>

</form>