<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RiwayatSkrining;

class CheckFirstLogin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Pastikan pengguna login
        if (!$user) {
            return redirect()->route('login');
        }

        // Cek apakah pengguna sudah menyelesaikan pretest
        $pretestCompleted = RiwayatSkrining::where('user_id', $user->id)
            ->where('jenis_sesi', 'Pretest')
            ->where('status', 'Completed')
            ->exists();

        if (!$pretestCompleted && !$request->is('pretest/*')) {
            return redirect()->route('pretest.disclaimer');
        }

        // Cek apakah pengguna sudah menyelesaikan posttest
        $posttestCompleted = RiwayatSkrining::where('user_id', $user->id)
            ->where('jenis_sesi', 'Post Test')
            ->where('status', 'Completed')
            ->exists();

        // Cek apakah ada data posttest
        $posttestExists = RiwayatSkrining::where('user_id', $user->id)
            ->where('jenis_sesi', 'Post Test')
            ->exists();

        // Jika pretest sudah selesai, tetapi posttest belum ada, arahkan ke halaman video
        if ($pretestCompleted && !$posttestExists && !$request->is('video/*')) {
            return redirect()->route('show.video',['kembali'=>false]);
        }

        // Jika belum menyelesaikan posttest dan user mengakses halaman selain posttest, redirect ke posttest
        if (!$posttestCompleted && !$request->is('posttest/*')) {
            return redirect()->route('posttest.disclaimer');
        }

        return $next($request);
    }
}
