<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'No.1 Sewa Van RM388 Termurah | 10 18 Seater | Sewa Hari Sama | Harga Terbaloi Malaysia') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div>
            <p class="text-center mb-0 mt-0 p-2 fw-bold bg-yellow">SEWAVAN Hanya dari RM388 sahaja!</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/img/sewavan-logo.webp') }}" alt="Sewa Van" width="90px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @guest
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/#van') }}" class="nav-link">Van</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">

                            <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="ms-2 btn btn-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                    @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('booking') }}">My Booking</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname}}
                                    {{ Auth::user()->lname}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item link-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fs-5 bi bi-check-circle-fill align-middle"></i>
                        <span> {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fs-5 bi bi-exclamation-circle-fill align-middle"></i>
                        <span> {{ session('error') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            @yield('content')
        </main>

        <footer class="bg-blue p-5 text-light">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col align-self-end">
                    <img src="{{ url('/img/sewavan-logo.webp') }}" alt="Sewa Van">
                    <div class="row row-cols-1 row-cols-md-2 mb-4">
                        <div class="col">
                            <p class="fw-bold fs-4 mb-1"><i class="bi bi-telephone"></i> Phone</p>
                            <p>+6017-360 8396</p>
                            <p class="fw-bold fs-4 mb-1"><i class="bi bi-envelope-at"></i> Email</p>
                            <p>revbikemy@gmail.com</p>
                        </div>
                        <div class="col">
                            <p class="fw-bold fs-4 mb-2">Social Media</p>
                            <a href="https://www.instagram.com/revmove_/" target="_blank" class="text-blue"><i class="bi bi-instagram bg-light p-2 rounded mx-1"></i></a>
                            <a href="https://www.facebook.com/revbikemy/" target="_blank" class="text-blue"><i class="bi bi-facebook bg-light p-2 rounded mx-1"></i></a>
                            <a href="https://youtube.com/@revmovemy" target="_blank"><i class="bi bi-youtube bg-light p-2 rounded mx-1"></i></a>
                            <a href="https://www.tiktok.com/@revmovemy" target="_blank" class="text-blue"><i class="bi bi-tiktok bg-light p-2 rounded mx-1"></i></a>
                            <a href="http://www.linkedin.com/company/utopiacoliving?trk=ppro_cprof" target="_blank" class="text-blue"><i class="bi bi-linkedin bg-light p-2 rounded mx-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <p class="fw-bold fs-4 mb-1"><i class="bi bi-pin-map"></i> Location</p>
                    <p class="mb-2">S-U1-02 Bistari Office Suite, Jalan 1/64D Off Jalan Putra, 50480, Kuala Lumpur. (HQ)</p>
                    <iframe class="w-100 h-75" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1991.8639387219657!2d101.69183238869985!3d3.1662176773189374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49f282fd2e9b%3A0x201a34f638f35d40!2sBistari%20Apartment%20Rental!5e0!3m2!1sen!2smy!4v1685459704031!5m2!1sen!2smy" style="border-radius:.5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <p class="text-center mt-5">&copy; 2023 Sewa Van (syhrzkwn.dev). All Rights Reserved.<br>Rev Move Berhad (1486439-U)</p>
        </footer>
    </div>
</body>
</html>
