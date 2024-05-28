<?php

namespace App\Http\Controllers;

use App\Models\TypeKamar;
use App\Models\Bisnis;
use App\Models\FasilitasKamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeKamarController extends Controller
{
    public function index()
    {
        $bisnis = Bisnis::all();
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
        $type = TypeKamar::where('id_bisnis', $user->id_bisnis)->latest()->get();
        return view('admin.pages.penginapan.type', compact('bisnis', 'type'));
    }

    public function create(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'gmbr_typekamar'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'gmbr_typekamar.required'   => 'gambar wajib diisi!!!'
        ]);

        // upload gambar
        $file = $request->gmbr_typekamar;
        $filename = $request->nm_typekamar . '.' . $file->extension();
        $file->move(public_path('img'), $filename);

        TypeKamar::create([
            'id_bisnis'         => $request->id_bisnis,
            'nm_typekamar'      => $request->nm_typekamar,
            'harga'             => $request->harga,
            'stok_kamar'        => $request->stok_kamar,
            'gmbr_typekamar'    => $filename,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_typekamar)
    {
        $typekamar = TypeKamar::findorfail($id_typekamar);
        // validasi gambar
        $this->validate($request, [
            'gmbr_typekamar'    => 'mimes:png,jpg,jpeg|max:15728640',
        ]);

        if ($request->gmbr_typekamar <> "") {
            // upload gambar
            $file = $request->gmbr_typekamar;
            $filename = $request->nm_typekamar . '.' . $file->extension();
            $file->move(public_path('img'), $filename);

            $typekamar->update([
                'id_bisnis'         => $request->id_bisnis,
                'nm_typekamar'      => $request->nm_typekamar,
                'harga'             => $request->harga,
                'stok_kamar'        => $request->stok_kamar,
                'gmbr_typekamar'    => $filename,
            ]);
        } else {
            $typekamar->update([
                'id_bisnis'     => $request->id_bisnis,
                'nm_typekamar'  => $request->nm_typekamar,
                'harga'         => $request->harga,
                'stok_kamar'    => $request->stok_kamar,
            ]);
        }

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_typekamar)
    {
        $typekamar = TypeKamar::findorfail($id_typekamar);
        $typekamar->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }

    public function info($id_typekamar)
    {
        $type = TypeKamar::findorfail($id_typekamar);
        $fasilitaskamar = FasilitasKamar::where('id_typekamar', $type->id_typekamar)->get();

        return view('admin.pages.penginapan.faskam', compact('type', 'fasilitaskamar'));
    }

    public function createfasilitaskamar(Request $request, $id_typekamar)
    {
        $typekamar = TypeKamar::findorfail($id_typekamar);

        FasilitasKamar::create([
            'id_typekamar'  => $typekamar->id_typekamar,
            'nm_faskam'     => $request->nm_faskam,
            'jumlah_faskam' => $request->jumlah_faskam,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }
}
