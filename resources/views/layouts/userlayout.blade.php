<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Costum CSS -->
    <link rel="stylesheet" href="{{ asset('css/style_user.css') }}" />

    <!-- AOS Animate -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Icon -->

    @yield('custom-css')

    <link rel="icon" href="{{ asset('assets/img/logo.svg') }}" />
    <title>UMKM Tangkisan</title>
</head>

<body>
    <!-- Navbar Section Open -->
<!-- resources/views/layouts/main.blade.php -->
<nav class="navbar navbar-expand-lg sticky-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo.svg') }}" class="me-3" alt="brand" />
            <span class="text-dark">Tangkisan|UMKM</span>
        </a>    
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}#about" id="about-link">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}#menu">Product</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @yield('navcategory')

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('mainCategory') }}">Lihat semua Kategori</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}#newslatter">Kontak Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
   
    {{-- <nav class=" navbar navbar-expand-lg sticky-top bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" class="me-3" alt="brand" />
                <span class="text-dark">Tangkisan|UMKM</span>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bx bx-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Product</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @yield('navcategory')

                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('mainCategory') }}">Lihat semua Kategori</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#newslatter">Kontak Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    <!-- Navbar Section Close -->

    {{-- content open --}}
    @yield('content')

    <!-- Footer Section Open -->
    <footer class="footer-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <div class="col-md-10">
                        <a href="#" class="footer-brand">
                            <img src={{ asset('assets/img/logo.svg') }} class="me-3" alt="brand" />
                            <span class="text-dark">Tangkisan|UMKM</span>
                            <p class="text-secondary mt-3">
                                Kami hadir untuk membantu Anda meningkatkan pemasaran produk dan memperkuat brand bisnis Anda. 
                                Bergabunglah dengan kami sekarang dan rasakan manfaatnya!
                            </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-content">
                                <span>Info</span>
                                <ul class="footer-link mt-3 list-unstyled">
                                    <li>
                                        <a href="#" class="py-1 d-block">Pesan langsung</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">Lokasi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="footer-content">
                                <span>Contact</span>
                                <ul class="footer-link mt-3 list-unstyled">
                                    <li>
                                        <a href="#" class="py-1 d-block">Purworejo - Indonesia</a>
                                    </li>
                                    <li>
                                        <a href="#" class="py-1 d-block">Tangkisan|UMKM</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <p class="copyright text-secondary text-center">
                    Copyright &copy; 2024 All rights reserved | By
                    <a class="text-primary" href="https://ilmaelfiraa.github.io">Firmansyah al fatoni</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- Footer Section Close -->

    <!-- AOS Animate on Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"
        integrity="sha512-+JZJvJZJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJzJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        AOS.init();
    </script>
    <!-- {{-- @yield('scripts') --}} -->
    <!-- Include custom JavaScript -->
    <!-- Include custom JavaScript -->
    <script src="{{ asset('js/slider.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Add this script at the end of your Blade template, just before the closing </body> tag. -->
    <script>
    // Get the current URL
    // document.addEventListener('DOMContentLoaded', (event) => {
    //     const currentPath = window.location.pathname;
    //     const aboutLink = document.getElementById('about-link');

    //     if (aboutLink) {
    //         aboutLink.addEventListener('click', function (e) {
    //             if (currentPath === '{{ route('dashboard') }}') {
    //                 e.preventDefault();
    //                 const aboutSection = document.getElementById('About');
    //                 if (aboutSection) {
    //                     aboutSection.scrollIntoView({ behavior: 'smooth' });
    //                 }
    //             }
    //         });
    //     }
    // });

    </script>


</body>

</html>