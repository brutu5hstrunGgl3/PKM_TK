<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Tk Harapan Ibu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon"  href="" type="image/x-icon">
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap & Template -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .video {
            position: relative;
            height: 100%;
            min-height: 400px;
            background: linear-gradient(rgba(255, 255, 255, 0.1),
                    rgba(255, 255, 255, 0.1)),
            url('{{ asset('storage/' . ($body->image ?? 'default.jpg')) }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <!-- Spinner -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top py-2">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                @if(isset($logo) && $logo->logo)
                    <img src="{{ asset('storage/' . e($logo->logo)) }}" alt="Logo" style="max-height: 60px;">
                @else
                    <span class="fw-bold text-primary fs-4">BabyCare</span>
                @endif
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    @forelse($menus as $menu)
                        <li class="nav-item">
                            <a href="{{ e($menu->url) }}" class="nav-link fw-medium text-dark px-3">
                                {{ e($menu->name) }}
                            </a>
                        </li>
                    @empty
                        <li class="nav-item">
                            <span class="nav-link text-muted fst-italic">Belum ada menu</span>
                        </li>
                    @endforelse
                </ul>

                <div class="d-flex align-items-center">
                    <i class="fa fa-phone-alt text-primary me-2"></i>
                    <div class="d-flex flex-column">
                        <small class="text-muted">Hubungi kami</small>
                        <a href="#" class="text-secondary text-decoration-none fw-semibold">
                            {{ e($contact->phone ?? '-') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="container-fluid position-relative p-0" data-wow-delay="0.1s">
        <div
            class="position-relative d-flex align-items-center justify-content-center text-center overflow-hidden hero-section">
            <img src="{{ asset('storage/' . ($content->image ?? 'default-hero.jpg')) }}" alt="Hero Image"
                class="position-absolute hero-image">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>

            <div class="container position-relative text-white z-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        @if(isset($logo) && $logo->logo)
                            <img src="{{ asset('storage/' . e($logo->logo)) }}" alt="Logo"
                                class="img-fluid mb-4 mx-auto d-block" style="max-height: 120px;">
                        @endif
                        <h1 class="display-4 fw-bold mb-3 gradient-text">
                            {{ e($content->title ?? 'We Care Your Baby') }}
                        </h1>
                        <h2 class="display-6 fw-bold mb-3 text-white">
                            {{ e($content->subtitle ?? '') }}
                        </h2>
                        <p class="lead mb-5 text-light">
                            {{ e($content->description ?? 'Tempat terbaik untuk anak-anak bermain dan belajar dalam lingkungan yang aman dan menyenangkan.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <div class="container-fluid py-5 about bg-light">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="video border">
                        
                    </div>
                </div>
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <h4
                        class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                        Tentang
                    </h4>
                    <h1 class="text-dark mb-4 display-5">
                        {{ e($body->judul ?? $body->title ?? 'We Learn Smart Way To Build Bright Future For Your Children') }}
                    </h1>
                    <p class="text-dark mb-4">
                        {{ e($body->content ?? $body->description ?? 'Lorem Ipsum is simply dummy text...') }}
                    </p>
                    <a href="{{ route('pendaftaran') }}" class="btn btn-primary px-5 py-3 btn-border-radius">Daftar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Events -->
    <div class="container-fluid events py-5 bg-light">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                    Kegiatan 
                </h4>
                <h1 class="mb-5 display-3">Jadwal Kegiatan </h1>
            </div>

            <div class="row g-5 justify-content-center">
                @forelse ($events as $event)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="events-item rounded" style="background-color:#0d47a1;">
                            <div class="events-inner position-relative">
                                <div class="events-img overflow-hidden rounded-circle position-relative">
                                    <img src="{{ asset('storage/' . e($event->image)) }}"
                                        class="img-fluid w-100 rounded-circle" alt="Event Image">
                                    <div class="event-overlay">
                                        <a href="{{ asset('storage/' . e($event->image)) }}"
                                            data-lightbox="event-{{ e($event->id) }}">
                                            <i class="fas fa-search-plus text-white fa-2x"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="px-4 py-2 bg-secondary text-white text-center events-rate">
                                    {{ e($event->date) }}
                                </div>

                                <div class="d-flex justify-content-between px-4 py-2 bg-secondary">
                                    <small class="text-white">
                                        <i class="fas fa-calendar me-1 text-primary"></i> {{ e($event->time) }}
                                    </small>
                                    <small class="text-white">
                                        <i class="fas fa-map-marker-alt me-1 text-primary"></i> {{ e($event->location) }}
                                    </small>
                                </div>
                            </div>

                            <div class="events-text p-4 border border-primary bg-white border-top-0 rounded-bottom">
                                <a href="#" class="h4">{{ e($event->description) }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <p>Belum ada event yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Tenaga Pengajar -->
    @if($teams->count() > 0)
        <div class="container-fluid team py-5">
            <div class="container py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-5 display-3">Tenaga Pengajar</h1>
                </div>

                <div class="row g-5 justify-content-center">
                    @foreach($teams as $team)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                            <div class="team-item border border-dark img-border-radius overflow-hidden">
                                <img src="{{ asset('storage/' . e($team->photo ?? 'img/default-team.jpg')) }}"
                                    class="img-fluid w-100" alt="{{ e($team->name) }}">
                                <div class="text-center py-3 bg-white">
                                    <h4 class="text-dark">{{ e($team->name) }}</h4>
                                    <p class="text-muted mb-2">{{ e($team->position ?? 'Staff') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Footer -->
    <div class="container-fluid footer py-5 wow fadeIn text-center" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <img src="{{ asset('storage/' . e($logo->logo ?? 'img/default-logo.png')) }}" alt="Logo"
                            class="mb-3" style="max-height: 60px;">
                        <h2 class="fw-bold mb-3">
                            <span class="text-primary">TK</span><span class="text-secondary">Harapan Ibu</span>
                        </h2>
                        <p class="mb-4">IZIN OPERASIONAL : 1884 /1751 / DIK 3</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="footer-item">
                        <h4
                            class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                            Lokasi
                        </h4>
                        <div class="d-flex flex-column align-items-center">
                            <p class="text-body mb-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>
                                {{ e($contact->alamat ?? '-') }}
                            </p>
                            <p class="text-body mb-4"><i class="fa fa-phone-alt text-primary me-2"></i>
                                {{ e($contact->phone ?? '-') }}
                            </p>
                            <div class="footer-icon d-flex justify-content-center">
                            @php
                                $icons = ['facebook', 'instagram', 'tiktok', 'youtube'];
                            @endphp

                            @foreach ($icons as $platform)
                                @php
                                    $url = $contact->sosmed[$platform] ?? null;
                                @endphp

                                <a class="btn btn-primary btn-sm-square me-3 rounded-circle text-white {{ empty($url) ? 'disabled opacity-50' : '' }}"
                                href="{{ $url ? e($url) : '#' }}"
                                target="_blank"
                                title="{{ ucfirst($platform) }}">
                                    <i class="fab fa-{{ $platform == 'x' ? 'youtube' : e($platform) }}"></i>
                                </a>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container-fluid copyright bg-danger py-4">
        <div class="container text-center text-md-start text-light">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <span><i class="fas fa-copyright text-light me-2"></i>
                        Tk Harapan Ibu | Powered by Universitas Panca Sakti Bekasi | {{ date('Y') }}</span>
                </div>
                <!-- <div class="col-md-6 text-md-end">
                    Designed by <a href="https://htmlcodex.com" class="border-bottom text-light">HTML Codex</a>
                    | Distributed by
                    <a href="https://themewagon.com" class="border-bottom text-light">ThemeWagon</a>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
