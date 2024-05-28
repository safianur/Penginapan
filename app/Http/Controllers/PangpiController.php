<?php

namespace App\Http\Controllers;

use App\Models\Pangpi;
use Illuminate\Http\Request;

class PangpiController extends Controller
{
    public function index()
    {
        // $pangpi = Pangpi::all()->paginate(10);
        $pangpi = Pangpi::latest()->get();
        return view('admin.pages.pangpi', compact('pangpi'));
    }

    public function create(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'gmbr_pangpi'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'gmbr_pangpi.required' => 'gambar wajib diisi!!!'
        ]);

        // upload gambar
        $file = $request->gmbr_pangpi;
        $filename = $request->tgl_pangpi . '.' . $file->extension();
        $file->move(public_path('img'), $filename);

        Pangpi::create([
            'tgl_pangpi' => $request->tgl_pangpi,
            'gmbr_pangpi' => $filename,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_pangpi)
    {
        $pangpi = Pangpi::findorfail($id_pangpi);
        // validasi gambar
        $this->validate($request, [
            'gmbr_pangpi'    => 'mimes:png,jpg,jpeg|max:15728640',
        ]);

        if ($request->gmbr_pangpi <> "") {
            // upload gambar
            $file = $request->gmbr_pangpi;
            $filename = $request->tgl_pangpi . '.' . $file->extension();
            $file->move(public_path('img'), $filename);

            $pangpi->update([
                'tgl_pangpi' => $request->tgl_pangpi,
                'gmbr_pangpi' => $filename,
            ]);
        } else {
            $pangpi->update([
                'tgl_pangpi' => $request->tgl_pangpi,
            ]);
        }

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_pangpi)
    {
        $pangpi = Pangpi::findorfail($id_pangpi);
        $pangpi->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }
}
