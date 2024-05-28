<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\DataPengunjung;
use App\Models\Reservasi;
use App\Models\TypeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RincianController extends Controller
{
    public function index()
    {
        $bisnis = Bisnis::all();
        $typekamar = TypeKamar::all();
        $auth_pengunjung = Auth::guard('data_pengunjung')->user()->id_pengunjung;
        $id_pengunjung = DataPengunjung::findOrFail($auth_pengunjung);
        $pengunjung = DataPengunjung::where('id_pengunjung', $id_pengunjung->id_pengunjung)->get();
        $reservasi = Reservasi::where('id_pengunjung', $id_pengunjung->id_pengunjung)->get();
        return view('user.pages.rincian', compact('bisnis', 'typekamar', 'pengunjung', 'reservasi'));
    }
}
