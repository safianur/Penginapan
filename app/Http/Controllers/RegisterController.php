<?php

namespace App\Http\Controllers;

use App\Models\DataPengunjung;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'nm_pengunjung'     => 'required',
            'email'     => 'required|unique:data_pengunjung|email:dns',
            'password'  => 'required|min:5'
        ], [
            'nm_pengunjung.required'    => 'nama wajib diisi!!!',
            'email.required'    => 'email wajib diisi!!!',
            'password.required' => 'password wajib diisi!!!',
            'password.min' => 'password minimal 5 karakter!!!',
        ]);

        $data = DataPengunjung::create([
            'nik_paspor'    => '',
            'nm_pengunjung' => $request->nm_pengunjung,
            'tempat_lahir'  => '',
            'tanggal_lahir' => $request->tanggal_lahir ?: null,
            'alamat'        => '',
            'email'         => $request->email,
            'kontak'        => '',
            'password'      => bcrypt($request->password),
        ]);

        return redirect('/login');
    }
}
