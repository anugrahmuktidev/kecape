@extends('layouts.basic')

@section('content')
    <div class="card table-responsive table-card">
        <div class="card-header">
            <h3 class="fw-text-bold">Riwayat Skrining</h3>
        </div>
        <div class="justify-content-center p-4">
            <!-- Striped Rows -->
            <table class="table table-sm table-striped text-center">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal dan Waktu</th>
                        <th scope="col">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayatSkrining as $index => $riwayat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d-m-Y') }} <br>
                                <small>Jam: {{ \Carbon\Carbon::parse($riwayat->tanggal)->format('H:i:s') }}</small>
                            </td>
                            <td>
                                @if ($riwayat->status_risiko === 'Rendah')
                                    <span class="badge bg-success">Risiko Rendah</span>
                                @elseif($riwayat->status_risiko === 'Sedang')
                                    <span class="badge bg-warning">Risiko Sedang</span>
                                @elseif($riwayat->status_risiko === 'Tinggi')
                                    <span class="badge bg-danger">Risiko Tinggi</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada riwayat skrining</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
