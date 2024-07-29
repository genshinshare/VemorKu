<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()
                                                                    ->mixedCase()
                                                                    ->numbers()
                                                                    ->symbols()
                                                                    ->uncompromised()]],
            [
                'required' => 'Harap isi kolom ini',
                'confirmed' => 'Harap isi kolom ini',
                'current_password' => 'Harap masukkan password yang benar',
                'password.min' => 'Harap password setidaknya berisikan 8 karakter',
                'password.letters' => 'Password harus berisikan setidaknya satu huruf',
                'password.mixedCase' => 'Password harus berisikan huruf kapital dan huruf biasa',
                'password.numbers' => 'Password harus berisikan setidaknya satu angka',
                'password.symbols' => 'Password harus berisikan setidaknya satu simbol',
                'password.uncompromised' => 'Password terlalu mudah, silahkan ganti password Anda'
            ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
