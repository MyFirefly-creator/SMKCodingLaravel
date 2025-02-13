<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Pacific History</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.index') }}">Post</a>
                </li>

                @if(Auth::check())
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#">Admin</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('formLogin') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
