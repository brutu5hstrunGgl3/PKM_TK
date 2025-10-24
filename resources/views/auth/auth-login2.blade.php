<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashboard/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('dashboard/library/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/components.css') }}">

    <!-- Custom CSS untuk background -->
    <style>
        /* Atur background untuk div login image */
        [data-background] {
            background-image: url('{{ asset('dashboard/img/unsplash/login.jpg') }}') !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center center !important;
            position: relative;
        }

        /* Overlay gradient di atas gambar */
        .overlay-gradient-bottom::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
            z-index: 1;
        }

        /* Pastikan elemen konten berada di atas overlay */
        .overlay-gradient-bottom > * {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex align-items-stretch flex-wrap">
                <!-- Form Login -->
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white-shadow ">
                    <div class="m-3 p-4">
                        <img src="{{ asset('dashboard/img/tk.png.png') }}" alt="logo" width="80"
                            class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal">Tk <span class="font-weight-bold">Harapan Ibu</span></h4>

                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="auth-forgot-password.html" class="float-left mt-3">Forgot Password?</a>
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Background Image -->
                <div class="col-lg-8 col-12 order-lg-2 min-vh-100 overlay-gradient-bottom order-1"
                    data-background="{{ asset('dashboard/img/unsplash/login.jpg') }}">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <!-- Konten tambahan bisa ditempatkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('dashboard/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('dashboard/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('dashboard/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dashboard/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.js') }}"></script>
</body>

</html>
