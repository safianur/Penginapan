<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\DataPengunjung;
use App\Models\FasilitasKamar;
use App\Models\FasilitasPublic;
use App\Models\Gallery;
use App\Models\Kegiatan;
use App\Models\Pangpi;
use App\Models\Reservasi;
use App\Models\TypeKamar;
use App\Models\Wisata;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BisnisUserController extends Controller
{
    public function index()
    {
        $bisnis = Bisnis::all();
        $typekamar = TypeKamar::all();
        return view('user.index', compact('bisnis', 'typekamar'));
    }

    public function gettypekamar(Request $request)
    {
        $id_bisnis = $request->id_bisnis;

        $typekamar = TypeKamar::where('id_bisnis', $id_bisnis)->get();

        $option = "<option>~ Pilih Type Kamar ~</option>";
        foreach ($typekamar as $id_typekamar) {
            $option .= "<option value='$id_typekamar->id_typekamar'> $id_typekamar->nm_typekamar</option>";
        }

        echo ($option);
    }

    public function booknow(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'nama'  => 'required',
            'nohp'  => 'required'
        ], [
            'email' => 'email wajib diisi',
            'nama'  => 'nama wajib diisi',
            'nohp'  => 'no hp wajib diisi',
        ]);


        $tglbooking = \Carbon\Carbon::now()->format('ymd');
        if ($request->lokasi == 1) {
            echo $kode = 'VPR';
        } else {
            echo $kode = 'MHRC';
        }
        $koderandom = Str::random(4);
        $kodebooking = $tglbooking . $kode . $koderandom;

        $datapengunjung = DataPengunjung::create([
            'nik_paspor'    => '',
            'nm_pengunjung' => $request->nama,
            'tempat_lahir'  => '',
            'tanggal_lahir' => $request->tanggal_lahir ?: null,
            'alamat'        => '',
            'email'         => $request->email,
            'kontak'        => $request->nohp,
        ]);

        $existingReservations = Reservasi::where('id_bisnis', $request->id_bisnis)
        ->where('id_typekamar', $request->id_typekamar)
        ->where(function($query) use ($request) {
            $query->whereBetween('checkin', [$request->checkin, $request->checkout])
                ->orWhereBetween('checkout', [$request->checkin, $request->checkout])
                ->orWhere(function($query) use ($request) {
                    $query->where('checkin', '<', $request->checkin)
                        ->where('checkout', '>', $request->checkout);
                });
        })->count();

        $typeKamar = TypeKamar::find($request->id_typekamar);
        // dd($typeKamar);

        // Periksa apakah kamar tersedia
        if ($existingReservations >= $typeKamar->stok_kamar) {
            $namaKamar = $typeKamar->nm_typekamar;
            Alert::error('Kamar Tidak Tersedia', "Kamar {$namaKamar} sudah habis dipesan untuk tanggal tersebut.");
            return redirect()->back();
        }

        $id_pengunjung = $datapengunjung->id_pengunjung;
        $ambildata = Reservasi::create([
            'id_bisnis'     => $request->id_bisnis,
            'id_pengunjung' => $id_pengunjung,
            'id_typekamar'  => $request->id_typekamar ?: null,
            'jumlah_orang'  => $request->jmlorang,
            'jumlah_kamar'  => $request->jmlkamar,
            'checkin'       => $request->checkin,
            'checkout'      => $request->checkout,
            'kode_booking'  => $kodebooking,
            'total_harga'   => '',
            'status'        => '',
            'bukti_transfer' => '',
        ]);

        $hari = 0;
        $ambil = Reservasi::all()->where('id_reservasi', $ambildata->id_reservasi);
        foreach ($ambil as $tanggal) {
            $tglcheckin = \Carbon\Carbon::parse($tanggal->checkin);
            $tglcheckout = \Carbon\Carbon::parse($tanggal->checkout);

            $hari += $tglcheckin->diffInDays($tglcheckout);
        }
        $totalharga = $tanggal->typekamar->harga * $tanggal->jumlah_kamar * $hari;

        $datareservasi = Reservasi::findorfail($tanggal->id_reservasi);
        $datareservasi->update([
            'id_bisnis'     => $tanggal->id_bisnis,
            'id_pengunjung' => $tanggal->id_pengunjung,
            'id_typekamar'  => $tanggal->id_typekamar,
            'jumlah_orang'  => $tanggal->jumlah_orang,
            'jumlah_kamar'  => $tanggal->jumlah_kamar,
            'checkin'       => $tanggal->checkin,
            'checkout'      => $tanggal->checkout,
            'kode_booking'  => $tanggal->kode_booking,
            'total_harga'   => $totalharga,
            'status'        => '',
            'bukti_transfer' => '',
        ]);

        $totalDP = 50 / 100 * $datareservasi->total_harga;

        $pdf = PDF::loadView('user.pages.kodereservasi', compact('datareservasi', 'totalDP'));

        return $pdf->stream('bukti_pemesanan.pdf');
    }

    public function cetakbukti($id_reservasi)
    {
        $ambildata = Reservasi::findOrFail($id_reservasi);
        return view('user.pages.buktibooking', compact('ambildata'));
    }

    public function buktitransfer(Request $request)
    {
        // validasi gambar
        $this->validate($request, [
            'bukti_transfer'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'bukti_transfer.mimes' => 'gambar wajib berupa png, jpg, atau jpeg!!!'
        ]);

        $reservasi = Reservasi::where('kode_booking', $request->kode_booking)->first();
        $pengunjung = DataPengunjung::where('id_pengunjung', $reservasi->id_pengunjung)->first();

        // upload gambar
        $file = $request->bukti_transfer;
        $filename = $pengunjung->nm_pengunjung . '.' . $file->extension();
        $file->move(public_path('img/buktitransfer'), $filename);

        $reservasi->update([
            'id_bisnis'      => $reservasi->id_bisnis,
            'id_pengunjung'  => $reservasi->id_pengunjung,
            'id_typekamar'   => $reservasi->id_typekamar,
            'jumlah_orang'   => $reservasi->jumlah_orang,
            'jumlah_kamar'   => $reservasi->jumlah_kamar,
            'checkin'        => $reservasi->checkin,
            'checkout'       => $reservasi->checkout,
            'kode_booking'   => $reservasi->kode_booking,
            'total_harga'    => $reservasi->total_harga,
            'status'         => $reservasi->status,
            'bukti_transfer' => $filename,
        ]);

        $pdf = PDF::loadView('user.pages.buktibooking', compact('reservasi'));

        return $pdf->stream('bukti_pemesanan.pdf');
    }

    public function villapakis(Request $request)
    {
        $bisnis = Bisnis::all();
        $alamat = Bisnis::where('id_bisnis', 1)->first();
        $typekamar = TypeKamar::where('id_bisnis', 1)->with('fasilitas_kamar')->get();
        $faspub = FasilitasPublic::where('id_bisnis', 1)->get();
        $wisata = Wisata::where('id_bisnis', 1)->get();
        $gallery = Gallery::where('id_bisnis', 1)->get();

        return view('user.pages.villapakis', compact('bisnis', 'alamat', 'typekamar', 'faspub', 'wisata', 'gallery'));
    }

    public function kusumahills(Request $request)
    {
        $bisnis = Bisnis::all();
        $alamat = Bisnis::where('id_bisnis', 2)->first();
        $typekamar = TypeKamar::where('id_bisnis', 2)->with('fasilitas_kamar')->get();
        $faskam = FasilitasKamar::with('typekamar')->where('id_typekamar', 3)->get();
        $faspub = FasilitasPublic::where('id_bisnis', 2)->get();
        $wisata = Wisata::where('id_bisnis', 2)->get();
        $gallery = Gallery::where('id_bisnis', 2)->get();
        return view('user.pages.kusumahills', compact('bisnis', 'alamat', 'typekamar', 'faskam', 'faspub', 'wisata', 'gallery'));
    }

    public function event()
    {
        $bisnis = Bisnis::all();
        $typekamar = TypeKamar::all();
        $event = Kegiatan::all();
        return view('user.pages.event', compact('bisnis', 'typekamar', 'event'));
    }

    public function other()
    {
        $bisnis = Bisnis::all();
        $pangpi = Pangpi::all();
        return view('user.pages.other', compact('bisnis', 'pangpi'));
    }
}
