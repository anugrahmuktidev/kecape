<?php

namespace App\Exports;

use App\Models\RiwayatSkrining;
use App\Models\Skrining;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SkriningExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return RiwayatSkrining::with('user', 'skrining.jawaban') // Pastikan untuk memuat jawaban
            ->where('jenis_sesi', 'Skrining')
            ->where('status', 'Completed') // Pastikan hanya mengambil yang sudah selesai
            ->orderBy('tanggal', 'desc')
            ->get()
            ->map(function ($riwayat) {
                // Mengambil semua soal yang terkait dengan riwayat skrining
                $soals = Skrining::where('riwayat_skrining_id', $riwayat->id)->get();
                $jawabanBenar = [];

                // Mengisi hasil untuk setiap soal P1 hingga P10
                foreach ($soals as $index => $soal) {
                    // Menyimpan hasil untuk setiap jawaban: 'Benar' jika kunci jawaban benar, 'Salah' jika tidak
                    $jawabanBenar[$index] = $soal->jawaban->kunci_jawaban ? 'Ya' : 'Tidak';
                }

                return [
                    'id' => $riwayat->id,
                    'nama_user' => $riwayat->user->name,
                    'no_hp' => $riwayat->user->no_hp,
                    'tanggal_lahir' => $riwayat->user->tanggal_lahir,
                    'jenis_kelamin' => $riwayat->user->jenis_kelamin,
                    'pendidikan' => $riwayat->user->pendidikan,
                    'pekerjaan' => $riwayat->user->pekerjaan == 'Lainnya'
                                   ? $riwayat->user->pekerjaan_lain
                                   : $riwayat->user->pekerjaan,
                    'alamat' => $riwayat->user->alamat,
                    'no_rumah' => $riwayat->user->no_rumah,
                    'rt' => $riwayat->user->rt,
                    'kelurahan' => $riwayat->user->kelurahan,
                    'kecamatan' => $riwayat->user->kecamatan,
                    'kabupaten' => $riwayat->user->kabupaten,
                    'provinsi' => $riwayat->user->provinsi,
                    'berat_badan' => $riwayat->user->berat_badan,
                    'tinggi_badan' => $riwayat->user->tinggi_badan,
                    'jenis_sesi' => $riwayat->jenis_sesi,
                    'tanggal' => $riwayat->tanggal,
                    // Menambahkan hasil jawaban untuk setiap soal P1 - P10
                    'P1' => $jawabanBenar[0] ?? 'Tidak',
                    'P2' => $jawabanBenar[1] ?? 'Tidak',
                    'P3' => $jawabanBenar[2] ?? 'Tidak',
                    'P4' => $jawabanBenar[3] ?? 'Tidak',
                    'P5' => $jawabanBenar[4] ?? 'Tidak',
                    'P6' => $jawabanBenar[5] ?? 'Tidak',
                    'P7' => $jawabanBenar[6] ?? 'Tidak',
                    'P8' => $jawabanBenar[7] ?? 'Tidak',
                    'P9' => $jawabanBenar[8] ?? 'Tidak',
                    'status_risiko' => $riwayat->status_risiko,

                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama User',
            'No HP',
            'Tinggi Badan',
            'Jenis Kelamin',
            'Pendidikan',
            'Pekerjaan', // Kolom ini akan berisi nilai dari pekerjaan atau pekerjaan_lain
            'Alamat',
            'No Rumah',
            'RT',
            'Kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Tanggal Lahir',
            'Berat Badan',
            'Jenis Sesi',
            'Tanggal',
            'P1',
            'P2',
            'P3',
            'P4',
            'P5',
            'P6',
            'P7',
            'P8',
            'P9',
            'Status Risiko',

        ];
    }
}
