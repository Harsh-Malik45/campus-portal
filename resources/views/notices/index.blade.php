<h1>All Notices</h1>

<a href="{{ route('notices.create') }}">
    Add Notice
</a>

<table border="1">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Actions</th>
    </tr>

    @foreach($notices as $notice)

    <tr>

        <td>{{ $notice->id }}</td>

        <td>{{ $notice->title }}</td>

        <td>

            <a href="{{ route('notices.edit',$notice->id) }}">
                Edit
            </a>

            <form
                action="{{ route('notices.destroy',$notice->id) }}"
                method="POST"
            >

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>