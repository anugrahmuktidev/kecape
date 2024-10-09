@extends('layouts.app')
@section('content')
    <div>
        <h4>Selamat datang, {{ $user->name }} !</h4>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    </div>
@endsection
