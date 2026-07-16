 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="#">
            Campus Portal
        </a>

        <div class="d-flex gap-2">

             @if(auth()->user()->role == 'admin')

                <a href="{{ route('dashboard') }}"
                   class="btn btn-light btn-sm">
                    Dashboard
                </a>

                <a href="{{ route('notices.index') }}"
                   class="btn btn-primary btn-sm">
                    Notices
                </a>

                <a href="{{ route('students.index') }}"
                   class="btn btn-info btn-sm">
                    Students
                </a>

                <a href="{{ route('results.index') }}"
                   class="btn btn-warning btn-sm">
                    Results
                </a>

                <a href="{{ route('users.index') }}"
                   class="btn btn-success btn-sm">
                    Users
                </a>

             @elseif(auth()->user()->role == 'student')

                <a href="{{ route('student.dashboard') }}"
                   class="btn btn-light btn-sm">
                    Dashboard
                </a>

                <a href="{{ route('student.profile') }}"
                   class="btn btn-info btn-sm">
                    My Profile
                </a>

                <a href="{{ route('student.results') }}"
                   class="btn btn-warning btn-sm">
                    My Results
                </a>

                <a href="{{ route('user.notices') }}"
                   class="btn btn-primary btn-sm">
                    Notices
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