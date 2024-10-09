<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SoalCrud;
use App\Http\Livewire\JawabanCrud;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PretestController;
use App\Http\Controllers\PosttestController;
use App\Http\Controllers\SkriningController;
use App\Http\Controllers\Auth\PasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/admin-login-unique', [AdminLoginController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin-login-unique', [AdminLoginController::class, 'login'])->middleware('guest');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});


Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('post.login')->middleware('guest');




Route::get('/soal', function () {
    return view('admin.soal.index');
})->middleware(['auth', 'admin'])->name('admin.soal.index');

Route::get('/users', function () {
    return view('admin.users.index');
})->middleware(['auth', 'admin'])->name('admin.users.index');

Route::get('/jawaban', function () {
    return view('admin.jawaban.index');
})->middleware(['auth', 'admin'])->name('admin.jawaban.index');

Route::get('/skrining', function () {
    return view('admin.skrining.data-skrining');
})->middleware(['auth', 'admin'])->name('admin.data.skrining');

Route::get('/pretest', function () {
    return view('admin.pretest.data-pretest');
})->middleware(['auth', 'admin'])->name('admin.data.pretest');

Route::get('/posttest', function () {
    return view('admin.posttest.data-posttest');
})->middleware(['auth', 'admin'])->name('admin.data.posttest');


Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

Route::get('/home', function () {
    return view('user.home');
})->middleware(['auth', 'verified'])->name('home');


Route::middleware(['auth', 'checkfirstlogin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/profil', function () {
        return view('user.profil');
    })->name('user.profil');
    Route::get('/home/riwayat', [SkriningController::class, 'viewSkriningHistory'])->name('skrining.history');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // pretest
    Route::get('/pretest/disclaimer', function () {
        return view('user.pretest.disclaimer');
    })->name('pretest.disclaimer');
    Route::get('/pretest/start', [PretestController::class, 'startTest'])->name('pretest.start');
    Route::get('/pretest/{questionNumber}', [PretestController::class, 'showQuestion'])->name('pretest.show');
    Route::post('/pretest/submit', [PretestController::class, 'submitPretestAnswer'])->name('pretest.submit');
    Route::get('/pretest/result', [PretestController::class, 'showPretestResult'])->name('pretest.result');
    Route::get('/pretest/remove-answer/{questionNumber}', [PretestController::class, 'removeAnswer'])->name('pretest.removeAnswer');
    // posttest
    Route::get('/posttest/disclaimer', function () {
        return view('user.posttest.disclaimer');
    })->name('posttest.disclaimer');
    Route::post('/posttest/start', [PosttestController::class, 'startTest'])->name('posttest.start');
    Route::get('/posttest/{questionNumber}', [PosttestController::class, 'showQuestion'])->name('posttest.show');
    Route::post('/posttest/submit', [PosttestController::class, 'submitPosttestAnswer'])->name('posttest.submit');
    Route::get('/posttest/result', [PosttestController::class, 'showPosttestResult'])->name('posttest.result');
    Route::get('/posttest/remove-answer/{questionNumber}', [PosttestController::class, 'removeAnswer'])->name('posttest.removeAnswer');



    Route::get('/skrining/disclaimer', function () {
        return view('user.skrining.disclaimer');
    })->name('skrining.disclaimer');
    Route::get('/skrining/start', [SkriningController::class, 'startTest'])->name('skrining.start');
    Route::get('/skrining/{questionNumber}', [SkriningController::class, 'showQuestion'])->name('skrining.show');
    Route::post('/skrining/submit', [SkriningController::class, 'submitSkriningAnswer'])->name('skrining.submit');
    Route::get('/skrining/result', [SkriningController::class, 'showSkriningtResult'])->name('skrining.result');
    Route::get('/skrining/remove-answer/{questionNumber}', [SkriningController::class, 'removeAnswer'])->name('skrining.removeAnswer');

    Route::get('/video/{kembali?}', [PretestController::class, 'showVideo'])->name('show.video');


});


require __DIR__ . '/auth.php';
