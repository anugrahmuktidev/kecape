<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Soal;
use App\Models\RiwayatSkrining;
use App\Models\Skrining;
use Illuminate\Support\Facades\Log;

class PretestController extends Controller
{
    public function startTest()
{
    $user = Auth::user();

    // Buat atau ambil riwayat pretest (riwayat_skrining)
    $riwayatSkrining = RiwayatSkrining::firstOrCreate([
        'user_id' => $user->id,
        'jenis_sesi' => 'Pretest',
    ], [
        'tanggal' => now(),
        'status' => 'In Progress',
    ]);

    // Redirect ke pertanyaan pertama
    return redirect()->route('pretest.show', ['questionNumber' => 1]);
}
    public function showQuestion($nomorSoal)
    {
        $user = Auth::user();

        // Validasi nomor soal
        if ($nomorSoal < 1 || $nomorSoal > 10) {
            return redirect()->route('pretest.show', ['questionNumber' => 1]);
        }

        // Ambil soal berdasarkan nomor soal
        $question = Soal::where('jenis_soal', 'Pre Test')->skip($nomorSoal - 1)->first();

        if (!$question) {
            return redirect()->route('pretest.result'); // Jika soal habis, arahkan ke hasil
        }

        $riwayatSkrining = RiwayatSkrining::where('user_id', $user->id)
        ->where('jenis_sesi', 'Pretest')
        ->where('status', 'In Progress')
        ->first();

        if ($riwayatSkrining) {
            // Ambil jawaban sebelumnya untuk soal ini
            $previousAnswer = Skrining::where('soal_id', $question->id)
                ->where('riwayat_skrining_id', $riwayatSkrining->id)
                ->first();
        } else {
            $previousAnswer = null;
        }

         // Hapus jawaban untuk soal ini jika ada, karena pengguna kembali ke nomor sebelumnya
         if ($riwayatSkrining) {
            Skrining::where('soal_id', $question->id)
            ->where('riwayat_skrining_id', $riwayatSkrining->id)
            ->delete();
        }

        // Ambil jawaban yang sesuai dengan soal
        $answers = $question->jawaban;

        return view('user.pretest.pretest', [
            'question' => $question,
            'answers' => $answers,
            'previous' => $previousAnswer ? $previousAnswer->jawaban_id : null,
            'currentQuestionNumber' => $nomorSoal
        ]);
    }

    public function submitPretestAnswer(Request $request)
    {
        // Validasi jawaban
        $request->validate([
            'jawaban_id' => 'required|exists:jawaban,id',
            'question_id' => 'required|exists:soal,id',
            'question_number' => 'required|integer'
        ]);

        $user = Auth::user();

        // Buat atau ambil riwayat pretest (riwayat_skrining)
        $riwayatSkrining = RiwayatSkrining::firstOrCreate([
            'user_id' => $user->id,
            'jenis_sesi' => 'Pretest',
        ], [
            'tanggal' => now(),
            'status' => 'In Progress',
        ]);

        // Periksa apakah jawaban untuk soal ini sudah ada
        $existingAnswer = Skrining::where('soal_id', $request->input('question_id'))
            ->where('riwayat_skrining_id', $riwayatSkrining->id)
            ->first();

        if (!$existingAnswer) {
            // Simpan jawaban ke tabel skrining jika belum ada
            $jawabanCount = Skrining::where('riwayat_skrining_id', $riwayatSkrining->id)->count();

            if ($jawabanCount < 10) {
                // Simpan jawaban ke tabel skrining
                Skrining::create([
                    'soal_id' => $request->input('question_id'),
                    'jawaban_id' => $request->input('jawaban_id'),
                    'riwayat_skrining_id' => $riwayatSkrining->id,
                ]);
            }
        }

        // Redirect ke pertanyaan berikutnya
        $nextQuestionNumber = $request->input('question_number') + 1;

        if ($nextQuestionNumber > 10) {
            $riwayatSkrining->update(['status' => 'Completed']);

            // Hitung total jawaban benar
            $riwayatPretest = RiwayatSkrining::where('user_id', $user->id)
                ->where('jenis_sesi', 'Pretest')
                ->where('status', 'Completed')
                ->latest('tanggal')
                ->first();

            $totalBenar = Skrining::where('riwayat_skrining_id', $riwayatPretest->id)
                ->whereHas('jawaban', function ($query) {
                    $query->where('kunci_jawaban', true);
                })
                ->count();

            return view('user.pretest.result', [
                'totalBenar' => $totalBenar,
                'totalSoal' => 10
            ]);
        }

        return redirect()->route('pretest.show', ['questionNumber' => $nextQuestionNumber]);
    }

    public function showVideo($kembali = null)
{
    // Jika $kembali null, berikan nilai default
    $bisakembali = $kembali ?? false;

    return view('user.pretest.video.play-video', ['kembali' => $bisakembali]);
}






}
