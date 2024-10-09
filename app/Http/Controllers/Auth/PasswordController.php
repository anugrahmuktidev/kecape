<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ]);

    $user = Auth::user();
    if (!Hash::check($request->input('current_password'), $user->password)) {
        return redirect()->back()->with('error', 'Current password is incorrect');
    }

    $user->password = bcrypt($request->input('password'));
    $user->save();

    return redirect()->route('admin.dashboard')->with('success', 'Password updated successfully');
}

}
