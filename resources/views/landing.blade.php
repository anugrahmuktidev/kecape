<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Kecapi TB: Kenali, Catat, dan Periksa Tuberculosis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-unja.png') }}">
    <script src="{{ asset('assets/js/layout.js') }}"></script>

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .nft-heros {
            position: relative;
            background-image: url('{{ asset('assets/img/tbc.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 1;
        }

        @media (max-width: 768px) {
            .nft-heros {
                height: auto;
                padding: 20px;
            }

            .fs-4 {
                font-size: 1.2rem;
            }

            .text-center img {
                max-width: 100%;
                height: auto;
            }
        }

        .logo-size {
            max-height: 80px;
            /* Atur tinggi maksimum logo */
            width: auto;
            /* Memastikan lebar otomatis sesuai rasio */
        }

        .card-logo {
            background-color: white;
            /* Card putih */
            border-radius: 40px;
            /* Radius 20px */
            padding: 15px;
            /* Padding untuk ruang di dalam card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Sedikit bayangan untuk efek card */
            max-width: 500px;
            /* Batasi lebar maksimal card */
            margin: 0 auto;
            /* Buat card tetap di tengah */
            text-align: center;
            /* Agar logo tetap sejajar di tengah */
        }

        .row-logo {
            display: flex;
            /* Flexbox untuk mengatur baris */
            justify-content: space-around;
            /* Logo disebar rata secara horizontal */
            flex-wrap: nowrap;
            /* Jangan membiarkan logo turun ke baris baru */
            gap: 10px;
            /* Jarak antar logo */
        }

        .col-3,
        .col-md-2 {
            display: flex;
            /* Flexbox di setiap kolom */
            justify-content: center;
            /* Meratakan logo di tengah */
            align-items: center;
            /* Meratakan logo secara vertikal */
        }
    </style>
</head>

<body>

    <div class="auth-page-wrapper">
        <!-- auth page bg -->
        <!-- auth page content -->
        <section class="section nft-heros">
            <div class="bg-overlay"></div>
            <div class="auth-page-content">
                <div class="container">
                    <div class="row-logo">
                        <div class="col-lg-12">
                            <div class="text-center text-white-50">
                                <div class="card-logo">
                                    <div class="row justify-content-center">
                                        <div class="col-3 col-md-2">
                                            <img src="{{ asset('assets/img/kemendikbud.png') }}" alt=""
                                                class="img-fluid logo-size">
                                        </div>
                                        <div class="col-3 col-md-2">
                                            <img src="{{ asset('assets/img/logo-unja.png') }}" alt=""
                                                class="img-fluid logo-size">
                                        </div>
                                        <div class="col-3 col-md-2">
                                            <img src="{{ asset('assets/img/blu-speed.png') }}" alt=""
                                                class="img-fluid logo-size">
                                        </div>
                                        <div class="col-3 col-md-2">
                                            <img src="{{ asset('assets/img/kampus-merdeka.png') }}" alt=""
                                                class="img-fluid logo-size">
                                        </div>
                                    </div>
                                </div>




                                <div class="my-3">
                                    <h1 class="fw-bold-text text-white mt-4">Aplikasi Kecapi TB</h1>
                                    <p class="fs-15 fw-medium text-white">V 2.0 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-12 col-md-6 d-flex align-items-center mb-4 mb-md-0">
                            <div class="card ribbon-box border shadow-none mb-lg-0 w-100">
                                <div class="card-body">
                                    <div class="ribbon ribbon-success round-shape fs-4 fw-medium">
                                        <i class="ri-account-pin-circle-line"></i> Pengembang :
                                    </div>
                                    <div class="ribbon-content mt-5 text-muted text-center">
                                        <p class="mb-1 fs-4">Dr. Ummi Kalsum, SKM., MKM</p>
                                        <p class="mb-1 fs-4">Dr. Abbasiah, SKM., M.Kep</p>
                                        <p class="mb-1 fs-4">Prof. Drs. Damris M, M.Sc., Ph.D.</p>
                                        <p class="mb-1 fs-4">Dr. Dra. Nizlel Huda, M.Kes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-12 col-md-6 d-flex align-items-center">
                            @if (Route::has('login'))
                                <div class="text-center w-100">
                                    @auth
                                        @if (Auth::user()->isAdmin())
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="btn btn-warning btn-lg w-100 fs-4 mb-4">Dashboard Admin</a>
                                        @else
                                            <a href="{{ url('/home') }}"
                                                class="btn btn-warning btn-lg w-100 fs-4 mb-4">Home</a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="btn btn-warning btn-lg w-100 fs-4 mb-3">Masuk</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="btn btn-success btn-lg w-100 fs-4 mb-3">Daftar</a>
                                        @endif
                                    @endauth
                                    <a href="" class="btn btn-primary btn-lg w-100 fs-4">Petunjuk Penggunaan</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center mt-sm-5 mb-4 text-white-50">
                                <p class="mt-3 fs-15 fw-medium text-white"> Prodi S3 Pendidikan MIPA Program
                                    Pascasarjana Universitas Jambi </p>
                                <p class="mt-3 fs-15 fw-medium text-white"> Prodi Magister Kesehatan Masyarakat FKIK
                                    Universitas Jambi </p>
                                <p> Bekerjasama dengan : </p>
                                <p class="mt-3 fs-15 fw-medium text-white"> Poltekkes Kemenkes RI Jambi </p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
        </section>
        <!-- end auth page content -->
    </div>
    <!-- end auth-page-wrapper -->

</body>

</html>
