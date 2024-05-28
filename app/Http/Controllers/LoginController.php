<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validasi = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('pesan', 'E-mail dan Password Salah!!!');

        // $this->validate($request, [
        //     'email'     => 'required|email:dns',
        //     'password'  => 'required'
        // ], [
        //     'email.required'    => 'email wajib diisi!!!',
        //     'password.required' => 'password wajib diisi!!!',
        // ]);

        // if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect('/dashboard');
        // } elseif (Auth::guard('data_pengunjung')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect('/');
        // }
    }

    public function logout(Request $request)
    {

        // if (Auth::guard('user')->check()) {
        //     Auth::guard('user')->logout();
        // } elseif (Auth::guard('data_pengunjung')->check()) {
        //     Auth::guard('data_pengunjung')->logout();
        // }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
