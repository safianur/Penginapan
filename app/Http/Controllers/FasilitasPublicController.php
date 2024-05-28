<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\FasilitasPublic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasilitasPublicController extends Controller
{
    public function index()
    {
        // $faspub = FasilitasPublic::all()->paginate(10);
        $bisnis = Bisnis::all();
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
        $faspub = FasilitasPublic::where('id_bisnis', $user->id_bisnis)->latest()->get();
        return view('admin.pages.penginapan.faspub', compact('bisnis', 'faspub'));
    }

    public function create(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'gmbr_faspub'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'gmbr_faspub.required' => 'gambar wajib diisi!!!'
        ]);

        // upload gambar
        $file = $request->gmbr_faspub;
        $filename = $request->nm_faspub . '.' . $file->extension();
        $file->move(public_path('img'), $filename);

        FasilitasPublic::create([
            'id_bisnis'   => $request->id_bisnis,
            'nm_faspub'   => $request->nm_faspub,
            'estimasi'    => $request->estimasi,
            'gmbr_faspub' => $filename,
            'link'        => $request->link,
        ]);

        return back()->with('pesan', 'Data Berhasil di Tambahkan!!!');
    }

    public function update(Request $request, $id_faspub)
    {
        $faspub = FasilitasPublic::findorfail($id_faspub);
        // validasi gambar
        $this->validate($request, [
            'gmbr_faspub'    => 'mimes:png,jpg,jpeg|max:15728640',
        ]);

        if ($request->gmbr_faspub <> "") {
            // upload gambar
            $file = $request->gmbr_faspub;
            $filename = $request->nm_faspub . '.' . $file->extension();
            $file->move(public_path('img'), $filename);

            $faspub->update([
                'id_bisnis'   => $request->id_bisnis,
                'nm_faspub'   => $request->nm_faspub,
                'estimasi'    => $request->estimasi,
                'gmbr_faspub' => $filename,
                'link'        => $request->link,
            ]);
        } else {
            $faspub->update([
                'id_bisnis' => $request->id_bisnis,
                'nm_faspub' => $request->nm_faspub,
                'estimasi'  => $request->estimasi,
                'link'      => $request->link,
            ]);
        }

        return back()->with('pesan', 'Data Berhasil di Edit!!!');
    }

    public function delete($id_faspub)
    {
        $faspub = FasilitasPublic::findorfail($id_faspub);
        $faspub->delete();
        return back()->with('pesan', 'Data Berhasil di Hapus!!!');
    }
}
