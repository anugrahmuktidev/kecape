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
                <p class="text-center">Laman ini merupakan laman Pre-Test. Digunakan untuk mengetahui pengetahuan dasar
                    pengguna terkait
                    Tuberculosis</p>
                <div class="text-center mt-4">
                    <a href="{{ route('pretest.start') }}" class="btn btn-primary">Mulai Pretest</a>
                </div>
            </div>
        </div>
    </div>
@endsection
