@extends('layouts.app')
@section('content')
    <div>
        @livewire('user') <!-- Display Livewire component if using Livewire -->
    </div>
@endsection
{{-- @section('content')
    <h1>Add New Admin</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Alert untuk pesan error -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.store.admin') }}">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan Nama">
            @error('name')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan Email">
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                placeholder="Masukkan Nomor HP" required>
            @error('no_hp')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required
                placeholder="Masukkan Password">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required
                placeholder="Konfirmasi Password">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Tambah Admin</button>
    </form>
@endsection --}}
