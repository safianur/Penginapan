<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::latest()->get();
        return view('admin.pages.kegiatan', compact('kegiatan'));
    }

    public function create(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'gmbr_kegiatan'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'gmbr_kegiatan.required' => 'gambar wajib diisi!!!'
        ]);

        // upload gambar
        $file = $request->gmbr_kegiatan;
        $filename = $request->nm_kegiatan . '.' . $file->extension();
        $file->move(public_path('img'), $filename);

        Kegiatan::create([
            'tgl_kegiatan' => $request->tgl_kegiatan,
            'nm_kegiatan' => $request->nm_kegiatan,
            'pengada_kegiatan' => $request->pengada_kegiatan,
            'gmbr_kegiatan' => $filename,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::findorfail($id_kegiatan);
        // validasi gambar
        $this->validate($request, [
            'gmbr_kegiatan'    => 'mimes:png,jpg,jpeg|max:15728640',
        ]);

        if ($request->gmbr_kegiatan <> "") {
            // upload gambar
            $file = $request->gmbr_kegiatan;
            $filename = $request->nm_kegiatan . '.' . $file->extension();
            $file->move(public_path('img'), $filename);

            $kegiatan->update([
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'nm_kegiatan' => $request->nm_kegiatan,
                'pengada_kegiatan' => $request->pengada_kegiatan,
                'gmbr_kegiatan' => $filename,
            ]);
        } else {
            $kegiatan->update([
                'tgl_kegiatan' => $request->tgl_kegiatan,
                'nm_kegiatan' => $request->nm_kegiatan,
                'pengada_kegiatan' => $request->pengada_kegiatan,
            ]);
        }

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_kegiatan)
    {
        $kegiatan = Kegiatan::findorfail($id_kegiatan);
        $kegiatan->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }
}
