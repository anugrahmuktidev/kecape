@extends('layouts.basic')

@section('content')
    <div class="alert alert-secondary text-center mb-4" role="alert">
        <strong> Gulir/Scroll</strong> ke bawah untuk membaca dan melanjutkan ke tahap selanjutnya!
    </div>
    <div class="row g-4">
        <!-- Kolom Kiri -->
        <div class="col-lg-6 col-md-12 d-flex align-items-start">
            <div class="ribbon-box shadow-none mb-lg-0 w-100">
                <div class="card justify-content-center">
                    <div class="ratio ratio-16x9 mb-4">
                        <!-- Ganti dengan iframe YouTube -->
                        <iframe id="youtube-video" width="560" height="315"
                            src="https://www.youtube.com/embed/rsnkYq4VmAk?si=E8qPfUkhWRFirawF&amp;controls=0&enablejsapi=1&rel=0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <h3 class="text-center my-2">Video Edukasi dan Pencegahan TB</h3>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-lg-6 col-md-12 d-flex align-items-center">
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-0 w-100">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape">Edukasi Tuberkulosis</div>

                    <div class="ribbon-content mt-4">
                        <p><strong>Tuberkulosis (TB)</strong> adalah penyakit menular yang disebabkan oleh bakteri
                            <em>Mycobacterium tuberculosis</em>.
                        </p>

                        <ul>
                            <li><strong>Siapa saja yang dapat tertular TB?</strong><br>Semua orang, terutama yang memiliki
                                daya tahan tubuh yang lemah.</li>
                            <li><strong>Apa yang terjadi jika TB tidak diobati?</strong><br>Penyakit TB dapat menyebabkan
                                penyakit kronis, bahkan kematian. Penderita bahkan dapat menularkan ke 10-15 orang di
                                sekitarnya
                                setiap tahun.
                            </li>
                        </ul>

                        <p><strong>Bagaimana cara memutus rantai penularan TB?</strong></p>
                        <ol>
                            <li>Jauhkan bayi dan balita dari penderita batuk</li>
                            <li>Berikan bayi ASI eksklusif sampai 6 bulan</li>
                            <li>Makan makanan dengan gizi seimbang</li>
                            <li>Lakukan etika bersin dan batuk secara benar</li>
                            <li>Istirahat yang cukup dan berolahraga secara teratur</li>
                            <li>Menjemur kasur atau karpet serta mengepel lantai minimal seminggu sekali</li>
                            <li>Hindari asap rokok/merokok</li>
                            <li>Membuka jendela pada pagi hari agar cahaya matahari masuk dan mendapatkan udara yang cukup
                            </li>
                        </ol>

                    </div>

                    @if ($kembali)
                        <p class="mt-4" style="color: orange">
                            Download <strong class="fw-text-bold">Leaflet Edukasi Tuberkulosis</strong>, panduan singkat
                            tentang pencegahan dan penanganan TB. Informasi lengkap mengenai gejala, penularan, dan
                            perlindungan
                            dari penyakit ini.
                        </p>
                    @endif
                    <p id="leafInfo" class="mt-4 d-none" style="color: orange">
                        Download <strong class="fw-text-bold">Leaflet Edukasi Tuberkulosis</strong>, panduan singkat
                        tentang pencegahan dan penanganan TB. Informasi lengkap mengenai gejala, penularan, dan perlindungan
                        dari penyakit ini.
                    </p>
                    @if (!$kembali)
                        <p id="textInfo" class="mt-4" style="color: red">*Tombol akan muncul saat video selesai
                            diputar
                        </p>
                    @endif


                    <!-- Tombol Selanjutnya -->

                    <div class="text-end hstack gap-2 justify-content-start mt-4">
                        @if ($kembali)
                            <a href="{{ route('home') }}" class="btn btn-outline-success me-2">
                                <i class="ri-close-circle-line align-middle"></i> Tutup
                            </a>
                            <a href="{{ asset('Leaflet.pdf') }}" id="downloadPamfletButton" class="btn btn-warning"
                                download>
                                <i class="ri-book-read-line align-middle"></i> Unduh Leaflet
                            </a>
                        @else
                            <a href="{{ asset('Leaflet.pdf') }}" id="downloadPamfletButton" class="btn btn-warning d-none"
                                download>
                                <i class="ri-book-read-line align-middle"></i> Unduh Leaflet
                            </a>
                            <a href="{{ route('posttest.disclaimer') }}" id="nextButton"
                                class="btn btn-success material-shadow-none d-none" aria-hidden="true">Selanjutnya</a>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        // Load YouTube API script
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        // Video selesai, tampilkan tombol download pamflet
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('youtube-video', {
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                var message = document.getElementById('textInfo');
                var messageB = document.getElementById('leafInfo');
                var downloadButton = document.getElementById('downloadPamfletButton');
                messageB.classList.remove('d-none')
                message.style.display = 'none';
                downloadButton.classList.remove('d-none'); // Tampilkan tombol download pamflet
            }
        }

        // Event listener untuk download pamflet
        document.getElementById('downloadPamfletButton').addEventListener('click', function() {
            var nextButton = document.getElementById('nextButton');
            nextButton.classList.remove('d-none');
            nextButton.removeAttribute('aria-hidden');
        });
    </script>
@endsection
