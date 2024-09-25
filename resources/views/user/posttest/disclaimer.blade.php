@extends('layouts.basic')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body bg-warning">
                <div class="text-center fw-bold-text">
                    <h3 class="text-center fw-bold-text"> Halo, {{ Auth::user()->name }} !</h3>
                </div>
            </div>
            <div class="card-body p-4">
                <p class="text-center">Laman ini merupakan laman <span class="text fst-italic">Post-Test</span> , digunakan
                    untuk mengetahui pengetahuan dasar pengguna terkait Tuberculosis setelah melihat video dan membaca
                    edukasi Tuberkulosis.</p>

                <!-- Tambahkan pertanyaan tentang berapa kali menonton video edukasi -->
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Berapa Kali Anda Menonton Video Edukasi TB Sebelumnya?</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('posttest.start') }}" method="POST">
                                @csrf
                                <div class="mb-3 ms-4">
                                    <label class="form-label">Pilih jumlah kali menonton:</label>
                                    <div class="form-check form-radio-success">
                                        <input class="form-check-input" type="radio" name="watchCount" id="watchCount1"
                                            value="1" required>
                                        <label class="form-check-label" for="watchCount1">1 kali</label>
                                    </div>
                                    <div class="form-check form-radio-success">
                                        <input class="form-check-input" type="radio" name="watchCount" id="watchCount2"
                                            value="2" required>
                                        <label class="form-check-label" for="watchCount2">2 kali</label>
                                    </div>
                                    <div class="form-check form-radio-success">
                                        <input class="form-check-input" type="radio" name="watchCount" id="watchCount3"
                                            value="3" required>
                                        <label class="form-check-label" for="watchCount3">3 kali</label>
                                    </div>
                                    <div class="form-check form-radio-success">
                                        <input class="form-check-input" type="radio" name="watchCount" id="watchCountMore"
                                            value="lebih_dari_3" required>
                                        <label class="form-check-label" for="watchCountMore">Lebih dari 3 kali</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button id="startTestButton" type="submit" class="btn btn-primary" disabled>Mulai
                                        Post-Test</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Menonaktifkan tombol mulai post-test secara default
        const radioButtons = document.querySelectorAll('input[name="watchCount"]');
        const startTestButton = document.getElementById('startTestButton');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', () => {
                // Mengaktifkan tombol jika salah satu radio button dipilih
                startTestButton.disabled = false;
            });
        });
    </script>
@endsection
