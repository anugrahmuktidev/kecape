<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;



class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memastikan hanya admin yang bisa mengakses
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $user = Auth::user();

        // dd($user);
        return view('admin.dashboard',compact('user'));
        // Tampilkan halaman dashboard admin
    }

    // App\Http\Controllers\AdminController.php

// public function addAdmin()
// {
//     return view('admin.users.add-admin');
// }

// public function storeAdmin(Request $request)
// {
//     // Validate the input data
//     $validatedData = $request->validate([
//         'name' => 'required|string',
//         'email' => 'required|email|unique:users',
//         'no_hp' => 'required|string',
//         'password' => 'required|confirmed',
//         'password_confirmation' => 'required',
//     ]);

//     // Create a new user with the admin role
//     try {
//         $user = User::create([
//             'name' => $validatedData['name'],
//             'email' => $validatedData['email'],
//             'no_hp' => $validatedData['no_hp'],
//             'password' => Hash::make($validatedData['password']),
//             'role' => 'admin', // Set the role field to 'admin'
//             'is_first_login' => false,
//         ]);
//         session()->forget('error'); // Pastikan pesan error tidak ada
//             Session::flash('success', 'Akun berhasil dibuat, Silahkan Login.');
//             return redirect()->back();

//     } catch (\Illuminate\Database\QueryException $e) {
//         session()->forget('success');
//             Session::flash('error', 'Terjadi kesalahan database: ' . $e->getMessage());
//             return redirect()->back()->withInput();
//     } catch(\Exception $e){
//         session()->forget('success');
//         Session::flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
//         return redirect()->back()->withInput();
//     }


// }

    // Tambahkan metode lain untuk menangani berbagai fungsi admin
}
