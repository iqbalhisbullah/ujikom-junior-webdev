<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Qbaltech</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('') }}assetss/img/favicon.png" rel="icon">
    <link href="{{ asset('') }}assetss/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}assetss/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('') }}assetss/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assetss/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}assetss/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assetss/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assetss/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('') }}assetss/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a>Qbaltech<span>.</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assetss/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                    {{-- cek apakah sudah login --}}
                    @if (Auth::check())
                    {{-- jika sudah tampilkan menu dashbord dan logout --}}
                    <li><a class="nav-link scrollto " href="{{ route('logout') }}">Logout</a></li>
                    @else
                    {{-- Jika belum tampilkan register dan login --}}
                    <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                    <li><a class="nav-link scrollto " href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
            <h1>Manage Employee Data Efficiently</h1>
            @if (Auth::check())
                <a href="{{ route('employee') }}" class="btn-get-started scrollto">Return To Activity</a>
                <img src="assetss/img/hero-img.png" class="img-fluid hero-img" alt="" data-aos="zoom-in"
                    data-aos-delay="150">
            @else
                <a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>
                <img src="assetss/img/hero-img.png" class="img-fluid hero-img" alt="" data-aos="zoom-in"
                    data-aos-delay="150">
            @endif
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="mb-4 info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Malang, Jawa Timur, Indonesia</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mb-4 info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>iqbalhisbullah14@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mb-4 info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+62 858 0431 7228</p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Qbaltech</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('') }}assetss/vendor/aos/aos.js"></script>
    <script src="{{ asset('') }}assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assetss/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('') }}assetss/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('') }}assetss/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('') }}assetss/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assetss/js/main.js"></script>

</body>

</html>
