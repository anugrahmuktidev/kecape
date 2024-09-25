@extends('layouts.basic')
@section('content')
    <div class="container-fluid">
        <div class="row row-cols-2 row-cols-md-2 g-4">
            <div class="col">
                <div class="card" style="background-color: #8BCAE0; color: white;">
                    <div class="card-body text-center py-4">
                        <lord-icon src="https://cdn.lordicon.com/fmasbomy.json" trigger="hover" colors="primary:#405189"
                            target="div" style="width:80px;height:80px"></lord-icon>
                        <a href="{{ route('user.profil') }}" class="stretched-link">
                            <h5 class="mt-4">Profil <span class="fw-bold-text">{{ Auth::user()->name }}</span></h5>
                        </a>
                        <h5 class="mt-4">( 1 )</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="background-color: #ACE5BB; color: white;">
                    <div class="card-body text-center py-4">
                        <lord-icon src="https://cdn.lordicon.com/svsiboke.json" trigger="hover"
                            colors="primary:#121331,secondary:#ebe6ef,tertiary:#f24c00,quaternary:#a866ee,quinary:#f9c9c0,senary:#3a3347"
                            target="div" style="width:80px;height:80px"></lord-icon>
                        <a href="{{ route('show.video', ['kembali' => true]) }}" class="stretched-link">
                            <h5 class="mt-4">Edukasi Tentang TB</h5>
                        </a>
                        <h5 class="mt-4">( 2 )</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-md-2 g-4 mt-4"> <!-- Baris baru untuk card ketiga dan keempat -->
            <div class="col">
                <div class="card" style="background-color: #EFEFC4; color: white;">
                    <div class="card-body text-center py-4">
                        <lord-icon src="https://cdn.lordicon.com/fbbaczvt.json" trigger="hover" colors="primary:#405189"
                            target="div" style="width:80px;height:80px"></lord-icon>
                        <a href="{{ route('skrining.disclaimer') }}" class="stretched-link">
                            <h5 class="mt-4">Deteksi Tanda/Gejala TB</h5>
                        </a>
                        <h5 class="mt-4">( 3 )</h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="background-color: #E9D0D0; color: white;">
                    <div class="card-body text-center py-4">
                        <lord-icon src="https://cdn.lordicon.com/ujxzdfjx.json" trigger="hover" colors="primary:#405189"
                            target="div" style="width:80px;height:80px"></lord-icon>
                        <a href="{{ route('skrining.history') }}" class="stretched-link">
                            <h5 class="mt-4">Riwayat Pengisian Deteksi TB</h5>
                        </a>
                        <h5 class="mt-4">( 4 )</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
@endsection
