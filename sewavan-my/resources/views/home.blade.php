<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>No.1 Sewa Van RM388 Termurah | 10 18 Seater | Sewa Hari Sama | Harga Terbaloi Malaysia</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            <p class="text-center mb-0 mt-0 p-2 fw-bold bg-yellow">SEWAVAN Hanya dari RM388 sahaja!</p>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('/img/sewavan-logo.webp') }}" alt="Sewa Van" width="90px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if (Route::has('login'))
                        @auth
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('booking') }}">My Booking</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname}}
                                    {{ Auth::user()->lname}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item link-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                        @else
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/#van') }}">Van</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn btn-outline-light">Log In</a>
                            <a href="{{ route('register') }}" class="ms-2 btn btn-success">Book Now</a>
                        </div>
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="mt-5">
                <div class="text-center">
                    <p class="text-orange fw-bolder fs-5">5 Minit Sewa Melalui Online!</p>
                    <h1 class="fst-italic fw-bolder" style="font-size: 55px">Sewa Van Murah</h1>
                    <h1 class="fst-italic text-orange fw-bolder" style="font-size: 55px">Dari RM388 Sehari</h1>
                    <p class="fs-5 my-4">Harga van sewa terbaloi di Malaysia.<br>Pandu sendiri atau dengan pemandu.<br>14 hingga 18 seater penumpang.</p>
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg">Book Now</a>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="text-center">
                <img src="{{ url('/img/sewavan-home.webp') }}" alt="Sewa Van" class="img-fluid" width="900px">
            </div>
        </div>
        <div class="bg-yellow py-5">
            <h1 class="text-center fw-bold">Lokasi Sewa Van Kami</h1>
            <div class="d-flex justify-content-center mt-5">
                <p class="me-3"><i class="bi bi-geo-alt text-danger"></i> Kuala Lumpur</p>
                <p class="me-3"><i class="bi bi-geo-alt text-danger"></i> Selangor</p>
                <p class="me-3"><i class="bi bi-geo-alt text-danger"></i> Negeri Sembilan</p>
                <p class="me-3"><i class="bi bi-geo-alt text-danger"></i> Melaka</p>
            </div>
        </div>
        <div class="p-5" style="background-color: #ececec">
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <i class="bi bi-truck fs-1"></i>
                    <h4 class="fw-bold">10 Hingga 18 Seater</h4>
                    <p class="text-secondary">Van kami boleh muat 10 hingga 18 penumpang. Boleh pilih pandu sendiri atau dengan pemandu.</p>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-laptop fs-1"></i>
                    <h4 class="fw-bold">Sewa Serta Merta</h4>
                    <p class="text-secondary">Semua van kami diservis sebelum sewa. Van boleh disewa bila-bila masa.</p>
                </div>
                <div class="col-md-3">
                    <i class="bi bi-cash-coin fs-1"></i>
                    <h4 class="fw-bold">Harga Terendah Malaysia</h4>
                    <p class="text-secondary">Harga van sewa kami termurah di Malaysia.</p>
                </div>
            </div>
        </div>
        <div class="container pt-5" id="van">
            <h1 class="text-center fw-bold mb-4">Pilihan Van Mudah. <span class="text-orange">Pemandu atau Pandu Sendiri.</span></h1>
            <p class="text-center fs-5">Harga sewa van termurah di Malaysia. Khas untuk perjalanan jauh.</p>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-5">
                @foreach($vans as $van)
                <div class="col">
                    <div class="card bg-transparent border-success">
                        <img src="/img/{{$van->image}}" class="mx-auto img-fluid" alt="{{ $van->title }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sewa {{ $van->title }}</h5>
                            <p class="card-text mb-0">{{ $van->description }}</p>
                            <p class="card-text mb-0"><i class="bi bi-truck-front me-2"></i>{{ $van->brand }}</p>
                            <p class="card-text mb-0"><i class="bi bi-people me-2"></i>{{ $van->seater }} Seater</p>
                            <p class="card-text"><i class="bi bi-gear me-2"></i>{{ $van->transmission }}</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-end">
                                <div>
                                    <p class=" card-text mb-1">Pandu Sendiri</p>
                                    <a href="{{ route('show-booking', $van->id) }}" class="btn btn-success">RM {{ $van->price_per_day }} / Hari</a>
                                </div>
                                <div class="text-end">
                                    <p class=" card-text mb-1">Dengan Pemandu<br>10 Jam</p>
                                    <a href="{{ route('show-booking', $van->id) }}" class="btn btn-success">RM {{ $van->price_with_driver }} / Hari</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card bg-blue text-yellow p-5 my-5">
                <div class="text-center">
                    <i class="bi bi-truck" style="font-size: 100px;"></i>
                    <h1 class="fw-bold" style="font-size: 55px">Perlukan Van Serta Merta?</h1>
                    <p class="fs-5 text-light mb-1">kami boleh sediakan perkhidmatan sewa van dalam hari yang sama.</p>
                    <p class="fs-5 text-light mb-4">WhatsApp untuk sebarang pertanyaan.</p>
                    <a href="https://api.whatsapp.com/send/?phone=60173608396&text=Saya+nak+sewa+van%21&type=phone_number&app_absent=0" target="_blank" class="btn btn-success btn-lg"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                </div>
            </div>
        </div>
        <div class="bg-yellow pt-5">
            <h1 class="text-center fw-bold mb-4">Sewa Van Dalam <span class="text-orange">5 Minit</span></h1>
            <div class="d-flex justify-content-center">
                <div>
                    <div class="d-flex align-items-center">
                        <p class="fw-bold" style="font-size: 90px">1</p>
                        <div class="ms-4">
                            <p class="fw-bold fs-4 mb-2">Sign Up</p>
                            <p><a href="{{ url('/register') }}" class="text-blue">Register</a> akaun anda terlebih dahulu sebelum melakukan booking.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="fw-bold" style="font-size: 90px">2</p>
                        <div class="ms-4">
                            <p class="fw-bold fs-4 mb-2">Pilih Van Anda</p>
                            <p>Pilih van yang sesuai dengan keperluan anda.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <p class="fw-bold" style="font-size: 90px">3</p>
                        <div class="ms-4">
                            <p class="fw-bold fs-4 mb-2">Selesai</p>
                            <p>Pembayaran penuh/booking boleh dibuat melalui online.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            <h1 class="text-center fw-bold mb-4">Van Termurah <span class="text-orange">Pemandu Selamat</span></h1>
            <p class="text-center fs-5">Lebih <strong>2,380 penyewa van</strong> yang berpuas hati. Hubungi kami sekarang!</p>
            <p class="text-center fs-5 mb-1 fst-italic">5.0 Rating</p>
            <div class="d-flex justify-content-center fs-1 text-yellow">
                <i class="bi bi-star-fill mx-1"></i>
                <i class="bi bi-star-fill mx-1"></i>
                <i class="bi bi-star-fill mx-1"></i>
                <i class="bi bi-star-fill mx-1"></i>
                <i class="bi bi-star-fill mx-1"></i>
            </div>
        </div>
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
    </body>
</html>
