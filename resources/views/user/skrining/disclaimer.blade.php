@extends('layouts.basic')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body bg-warning">
                <h3 class="text-center fw-bold-text"> Selamat Datang, {{ Auth::user()->name }} !</h3>
            </div>
            <div class="card-body p-4">
                <h3 class="text-center fw-bold-text">Disclaimer</h3>
                {{-- <p class="text-center">Harap baca informasi berikut dengan seksama sebelum memulai pretest.</p> --}}
                <p class="text-center">Skrining TB (Tuberculosis) bertujuan untuk memberikan gambaran keadaan anda dari
                    hasil pengisian pertanyaan yang anda lakukan, maka di harapkan agar mengisi dengan kondisi anda yang
                    sebenarnya. Hasil dari skrining ini adalah gambaran resiko anda dari paparan TB.</p>
                <div class="text-center mt-4">
                    <a href="{{ route('skrining.start') }}" class="btn btn-primary">Mulai Skrining</a>
                </div>
            </div>
        </div>
    </div>
@endsection
