<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WisataController extends Controller
{
    public function index()
    {
        // $wisata = Wisata::all()->paginate(10);
        $bisnis = Bisnis::all();
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
        $wisata = Wisata::where('id_bisnis', $user->id_bisnis)->latest()->get();
        return view('admin.pages.penginapan.wisata', compact('bisnis', 'wisata'));
    }

    public function create(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'gmbr_wisata'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'gmbr_wisata.required' => 'gambar wajib diisi!!!'
        ]);

        // upload gambar
        $file = $request->gmbr_wisata;
        $filename = $request->nm_wisata . '.' . $file->extension();
        $file->move(public_path('img'), $filename);

        Wisata::create([
            'id_bisnis'   => $request->id_bisnis,
            'nm_wisata'   => $request->nm_wisata,
            'estimasi'    => $request->estimasi,
            'gmbr_wisata' => $filename,
            'link'        => $request->link,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_wisata)
    {
        $wisata = Wisata::findorfail($id_wisata);
        // validasi gambar
        $this->validate($request, [
            'gmbr_wisata'    => 'mimes:png,jpg,jpeg|max:15728640',
        ]);

        if ($request->gmbr_wisata <> "") {
            // upload gambar
            $file = $request->gmbr_wisata;
            $filename = $request->nm_wisata . '.' . $file->extension();
            $file->move(public_path('img'), $filename);

            $wisata->update([
                'id_bisnis'   => $request->id_bisnis,
                'nm_wisata'   => $request->nm_wisata,
                'estimasi'    => $request->estimasi,
                'gmbr_wisata' => $filename,
                'link'        => $request->link,
            ]);
        } else {
            $wisata->update([
                'id_bisnis' => $request->id_bisnis,
                'nm_wisata' => $request->nm_wisata,
                'estimasi'  => $request->estimasi,
                'link'      => $request->link,
            ]);
        }

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_wisata)
    {
        $wisata = Wisata::findorfail($id_wisata);
        $wisata->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }
}
