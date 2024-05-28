<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $bisnis = Bisnis::all();
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
        $gallery = Gallery::where('id_bisnis', $user->id_bisnis)->latest()->get();
        return view('admin.pages.penginapan.gallery', compact('bisnis', 'gallery'));
    }

    public function create(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'gmbr_gallery'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'gmbr_gallery.required' => 'gambar wajib diisi!!!'
        ]);

        // upload gambar
        $file = $request->gmbr_gallery;
        $filename = $request->nm_gallery . '.' . $file->extension();
        $file->move(public_path('img'), $filename);

        Gallery::create([
            'id_bisnis' => $request->id_bisnis,
            'nm_gallery' => $request->nm_gallery,
            'keterangan_gallery' => $request->keterangan_gallery,
            'gmbr_gallery' => $filename,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_gallery)
    {
        $gallery = Gallery::findorfail($id_gallery);
        // validasi gambar
        $this->validate($request, [
            'gmbr_gallery'    => 'mimes:png,jpg,jpeg|max:15728640',
        ]);

        if ($request->gmbr_gallery <> "") {
            // upload gambar
            $file = $request->gmbr_gallery;
            $filename = $request->nm_gallery . '.' . $file->extension();
            $file->move(public_path('img'), $filename);

            $gallery->update([
                'id_bisnis' => $request->id_bisnis,
                'nm_gallery' => $request->nm_gallery,
                'keterangan_gallery' => $request->keterangan_gallery,
                'gmbr_gallery' => $filename,
            ]);
        } else {
            $gallery->update([
                'id_bisnis' => $request->id_bisnis,
                'nm_gallery' => $request->nm_gallery,
                'keterangan_gallery' => $request->keterangan_gallery,
            ]);
        }

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_gallery)
    {
        $gallery = Gallery::findorfail($id_gallery);
        $gallery->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }
}
