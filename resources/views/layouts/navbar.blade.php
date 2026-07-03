 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="#">
            Campus Notice Board
        </a>

        <div>

            @if(auth()->user()->role == 'admin')

                <a href="{{ route('dashboard') }}"
                   class="btn btn-light btn-sm">
                    Dashboard
                </a>

                <a href="{{ route('notices.index') }}"
                   class="btn btn-primary btn-sm">
                    Notices
                </a>

                <a href="{{ route('users.index') }}"
                   class="btn btn-success btn-sm">
                    Users
                </a>

            @else

                <a href="{{ route('dashboard') }}"
                   class="btn btn-light btn-sm">
                    Dashboard
                </a>

                <a href="{{ route('user.notices') }}"
                   class="btn btn-primary btn-sm">
                    Notices
                </a>

            @endif

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-danger btn-sm">
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>