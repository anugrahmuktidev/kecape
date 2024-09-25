@extends('layouts.basic')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12"> <!-- Menambahkan col-md-12 untuk layar kecil -->
            <div class="card border card-border-info m-0">
                <div class="card-info rounded-lg">
                    <h5 class="card-title my-1 p-3">Biodata Pengguna</h5>
                </div>
                <div class="card-body rounded-lg border card-border-success" style="padding: 20px;">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th class="ps-0" style="width: 200px; text-align: left;">Nama</th>
                                    <td style="width: 10px;">:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->name) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Telp</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->no_hp) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Tanggal Lahir</th>
                                    <td>:</td>
                                    <td class="text-muted">
                                        {{ \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Jenis Kelamin</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->jenis_kelamin) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Berat Badan</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->berat_badan) }} kg</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Tinggi Badan</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->tinggi_badan) }} cm</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Pendidikan Terakhir</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->pendidikan) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Pekerjaan</th>
                                    <td>:</td>
                                    <td class="text-muted">
                                        @if (Auth::user()->pekerjaan == 'Lainnya')
                                            {{ ucwords(Auth::user()->pekerjaan_lain) }}
                                        @else
                                            {{ ucwords(Auth::user()->pekerjaan) }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th class="ps-0" style="text-align: left;">Alamat</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->alamat) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">RT/RW</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->rt) }}/{{ ucwords(Auth::user()->rw) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Desa/Kelurahan</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->kelurahan) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Kecamatan</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->kecamatan) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Kota/Kabupaten</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->kabupaten) }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" style="text-align: left;">Provinsi</th>
                                    <td>:</td>
                                    <td class="text-muted">{{ ucwords(Auth::user()->provinsi) }}</td>
                                </tr>

                            </tbody>

                        </table>
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('home') }}" class="btn btn-outline-success me-2">
                                <i class="ri-close-circle-line align-middle"></i> Tutup
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                @csrf
                                <button type="submit" class="btn btn-danger me-2">
                                    <i class="ri-logout-circle-line align-middle"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
    </div>
@endsection
