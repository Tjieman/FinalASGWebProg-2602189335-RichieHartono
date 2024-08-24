<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        @auth
            <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rp {{ Auth::user()->walletBalance }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('friends') }}">Friends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notification') }}">Notification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lang.switch', 'en') }}" >English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lang.switch', 'id') }}" >Indonesian</a>
                    </li>
                </ul>
                <div class="d-flex justify-content-center align-items-center">
                    @php
                        $user = Auth::user();
                        $username = str_replace('https://www.linkedin.com/in/', '', $user->linkedInUsername);
                    @endphp
                    <p class="p-0 m-0 me-2">Hello, <span style="font-weight: bold">{{ $username }}</span>!</p>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang.switch', 'en') }}" >English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang.switch', 'id') }}" >Indonesian</a>
                </li>
            </ul>

            <div class="d-flex">
                <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-primary me-2">Login</button>
                </a>

                <a href="{{ route('register') }}">
                    <button type="button" class="btn btn-secondary">Register</button>
                </a>
            </div>
        @endauth

    </div>
</nav>
