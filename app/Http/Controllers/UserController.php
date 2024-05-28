<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $bisnis = Bisnis::all();
        $user = User::latest()->get();
        // echo $user;
        return view('admin.pages.user', compact('user', 'bisnis'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nib'       => 'required|unique:users,nib|min:8|max:8',
            'email'     => 'required|email:dns',
            'kontak'    => 'min:11|max:13',
            'password'  => 'required|unique:users,password|min:6',
        ], [
            'nib.required'      => 'nib Wajib Diisi!!!',
            'nib.unique'        => 'nib Sudah Ada!!!',
            'nib.min'           => 'Min 8 Karakter',
            'nib.max'           => 'Max 8 Karakter',
            'email.required'    => 'E-mail Wajib Diisi!!!',
            'email.email'       => 'E-mail wajib berakhiran DNS',
            'kontak.required'   => 'Kontak Wajib Diisi!!!',
            'kontak.min'        => 'Min 11 Karakter',
            'kontak.max'        => 'Min 13 Karakter',
            'password.required' => 'Password Wajib Diisi!!!',
            'password.unique'   => 'Password Sudah Ada!!!',
            'password.min'      => 'Min 6 Karakter',
        ]);

        User::create([
            'id_bisnis'     => $request->id_bisnis,
            'nib'           => $request->nib,
            'nm_pegawai'    => $request->nm_pegawai,
            'email'         => $request->email,
            'kontak'        => $request->kontak,
            'jabatan'       => $request->jabatan,
            'password'      => bcrypt($request->password)
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_user)
    {
        $user = User::find($id_user);
        $this->validate($request, [
            'email'     => 'email:dns',
            'kontak'    => 'min:11|max:13',
            'password'  => 'min:6',
        ], [
            'email.email'       => 'E-mail wajib berakhiran DNS',
            'kontak.min'        => 'Min 11 Karakter',
            'kontak.max'        => 'Min 13 Karakter',
            'password.min'      => 'Min 6 Karakter',
        ]);

        $user->update([
            'id_bisnis'     => $request->id_bisnis,
            'nib'           => $request->nib,
            'nm_pegawai'    => $request->nm_pegawai,
            'email'         => $request->email,
            'kontak'        => $request->kontak,
            'jabatan'       => $request->jabatan,
            'password'      => bcrypt($request->password)
        ]);

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_user)
    {
        $user = User::findorfail($id_user);
        $user->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }
}
