<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <title>@yield('title') &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('dashboard/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('dashboard/css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard/css/components.css') }}">

    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @include('components.header')

            <!-- Sidebar -->
            @include('components.sidebar')

            <!-- Content -->
            @yield('main')

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('dashboard/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('dashboard/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('dashboard/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dashboard/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/stisla.js') }}"></script>

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.js') }}"></script>
</body>

</html>
