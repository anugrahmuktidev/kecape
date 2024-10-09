<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Kecapi TB: Kenali, Catat, dan Periksa Tuberculosis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo-unja.png') }}">
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
        body {
            margin: 0;
            padding: 0;
            background-image: url('{{ asset('assets/img/tbc.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        .fw-bold-text {
            font-weight: bold;
        }

        .auth-page-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            /* padding: 20px; */
        }

        .auth-page-content {
            position: relative;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.4);
            padding: 30px;
            /* border-radius: 8px; */
        }

        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        h1 {
            font-size: 2rem;
            /* Memperbesar ukuran font h1 */
            font-weight: bold;
        }

        h3 {
            font-size: 1.4rem;
            /* Memperbesar ukuran font h1 */
            font-weight: bold;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.75rem;
                /* Ukuran font lebih besar untuk layar kecil */
            }

            .fs-15 {
                font-size: 0.9rem;
            }

            .row img {
                height: 30px;
            }

            .col-md-1 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        .logo-size {
            max-height: 70px;
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

                @yield('content')

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
            </div>
        </div>
    </div>
</body>

</html>
