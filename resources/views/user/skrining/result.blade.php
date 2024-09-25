@extends('layouts.basic')

@section('content')
    <style>
        @media (max-width: 576px) {
            .card {
                width: 100%;
                /* Buat kartu memenuhi lebar layar di perangkat mobile */
                margin: 10px auto;
                /* Tambahkan margin kecil untuk pemisahan */
            }

            .card-body {
                padding: 15px;
                /* Tambahkan padding yang nyaman di dalam kartu */
            }

            .badge {
                font-size: 0.85rem;
                /* Kurangi ukuran badge agar sesuai */
                padding: 5px 10px;
                /* Sesuaikan padding badge */
            }

            ol.ms-3 {
                margin-left: 0 !important;
                /* Hilangkan margin untuk tampilan lebih rata */
                padding-left: 1.2rem;
                /* Beri sedikit padding agar teks tetap terbaca */
            }

            .text-end {
                text-align: center;
                /* Atur tombol ke tengah pada perangkat kecil */
                margin-top: 10px;
            }

            .btn {
                width: 100%;
                /* Buat tombol lebar penuh di perangkat kecil */
                font-size: 0.9rem;
                /* Sesuaikan ukuran font tombol */
            }
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 p-2">
            @if ($statusRisiko === 'Rendah')
                <!-- Kartu Risiko Rendah -->
                <div class="card border card-border-success">
                    <div class="card-header bg-success text-white">
                        <h6 class="card-title mb-0 text-center">HASIL SKRINING TUBERCULOSIS</h6>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-success align-middle fs-6 my-3 d-block text-center text-wrap">ANDA TERMASUK
                            KATEGORI BERESIKO RENDAH TERPAPAR TB</span>
                        <p class="card-text">Rencana Tindak Lanjut :</p>
                        <ol class="ms-3">
                            <li>Segera ke Pelayanan Kesehatan terdekat jika mengalami batuk lebih dari 2 minggu</li>
                            <li>Gunakan masker apabila kontak/dekat dengan anggota serumah yang sakit</li>
                            <li>Tutup mulut dengan tisu/tangan apabila batuk/bersin, buang tisu di tempat sampah tertutup,
                                cuci tangan dengan air mengalir dan sabun.</li>
                            <li>Hindari penggunaan peralatan makan/minum secara bersama dengan anggota keluarga yang sakit.
                            </li>
                            <li>Makan makanan bergizi</li>
                            <li>Jaga kebersihan diri dan lingkungan</li>
                            <li>Buka jendela setiap pagi</li>
                            <li>Jemur kasur secara rutin 1 minggu sekali</li>
                        </ol>
                        <div class="text-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-success">Tutup</a>
                        </div>
                    </div>
                </div>
            @elseif ($statusRisiko === 'Sedang')
                <!-- Kartu Risiko Sedang -->
                <div class="card border card-border-warning">
                    <div class="card-header bg-warning text-white">
                        <h6 class="card-title mb-0 text-center">HASIL SKRINING TUBERCULOSIS</h6>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-warning align-middle fs-6 my-3 d-block text-center">ANDA TERMASUK KATEGORI
                            BERESIKO SEDANG TERPAPAR TB</span>
                        <p class="card-text">Rencana Tindak Lanjut :</p>
                        <p>Silahkan segera kunjungi fasilitas pelayanan kesehatan terdekat untuk mendapatkan:</p>
                        <ol class="ms-3">
                            <li>Pemeriksaan Medis</li>
                            <li>Skrining TB</li>
                        </ol>
                        <p>Aktifitas di rumah:</p>
                        <ol class="ms-3">
                            <li>Gunakan masker apabila kontak/dekat dengan orang sekitar</li>
                            <li>Tutup mulut dengan tisu/tangan apabila batuk/bersin, buang tisu di tempat sampah tertutup,
                                cuci tangan dengan air mengalir dan sabun.</li>
                            <li>Hindari penggunaan peralatan makan/minum secara bersama dengan anggota keluarga yang lain.
                            </li>
                            <li>Makan makanan bergizi</li>
                            <li>Jaga kebersihan diri dan lingkungan</li>
                            <li>Buka jendela setiap pagi</li>
                            <li>Jemur kasur secara rutin 1 minggu sekali</li>
                        </ol>
                        <div class="text-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-warning">Tutup</a>
                        </div>
                    </div>
                </div>
            @elseif ($statusRisiko === 'Tinggi')
                <!-- Kartu Risiko Tinggi -->
                <div class="card border card-border-danger">
                    <div class="card-header bg-danger text-white">
                        <h6 class="card-title mb-0 text-center">HASIL SKRINING TUBERCULOSIS</h6>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-danger align-middle fs-6 my-3 d-block text-center">ANDA TERMASUK KATEGORI
                            BERESIKO TINGGI TERPAPAR TB</span>
                        <p class="card-text">Rencana Tindak Lanjut :</p>
                        <p>Silahkan segera kunjungi fasilitas pelayanan kesehatan terdekat untuk mendapatkan:</p>
                        <ol class="ms-3">
                            <li>Pemeriksaan Medis</li>
                            <li>Pemeriksaan sputum</li>
                            <li>Pemeriksaan Rontgent dada</li>
                        </ol>
                        <p>Aktifitas di rumah:</p>
                        <ol class="ms-3">
                            <li>Gunakan masker apabila kontak/dekat dengan orang sekitar</li>
                            <li>Tutup mulut dengan tisu/tangan apabila batuk/bersin, buang tisu di tempat sampah tertutup,
                                cuci tangan dengan air mengalir dan sabun.</li>
                            <li>Hindari penggunaan peralatan makan/minum secara bersama dengan anggota keluarga yang lain.
                            </li>
                            <li>Makan makanan bergizi</li>
                            <li>Jaga kebersihan diri dan lingkungan</li>
                            <li>Buka jendela setiap pagi</li>
                            <li>Jemur kasur secara rutin 1 minggu sekali</li>
                        </ol>
                        <div class="text-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
