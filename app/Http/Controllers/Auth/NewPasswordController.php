<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()
                                                                          ->mixedCase()
                                                                          ->numbers()
                                                                          ->symbols()]]
        ,[
            'required' => 'Harap isi kolom ini',
            'confirmed' => 'Harap isi kolom ini',
            'password.min' => 'Harap password setidaknya berisikan 8 karakter',
            'password.letters' => 'Password harus berisikan setidaknya satu huruf',
            'password.mixedCase' => 'Password harus berisikan huruf kapital dan huruf biasa',
            'password.numbers' => 'Password harus berisikan setidaknya satu angka',
            'password.symbols' => 'Password harus berisikan setidaknya satu simbol',
            'password.uncompromised' => 'Password terlalu mudah, silahkan ganti password Anda'
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', 'Password Berhasil diubah.')
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => 'Token reset telah kedaluwarsa. Silahkan kirim Reset Password kembali <a href="'.route('password.request').'" class="text-blue-900 hover:text-black font-extrabold">disini</a>.']);
    }
}
