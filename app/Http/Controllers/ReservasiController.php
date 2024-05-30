<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\DataPengunjung;
use App\Models\Reservasi;
use App\Models\TypeKamar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReservasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $id_user = Auth::id();
        $user = User::findOrFail($id_user);
    
        $reservasiQuery = Reservasi::where('id_bisnis', $user->id_bisnis);
    
        if ($search) {
            $reservasiQuery->whereHas('pengunjung', function ($query) use ($search) {
                $query->where('nm_pengunjung', 'like', "%{$search}%");
            });
        }
        
        $reservasi = $reservasiQuery->latest()->paginate(5);
        $bisnis = Bisnis::all();
        
        return view('admin.pages.list.list', compact('bisnis', 'reservasi', 'search'));
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

    public function create(Request $request)
    {
        $this->validate($request, [
            'email'  => 'email:dns',
            'kontak' => 'min:11|max:13',
        ], [
            'kontak.min' => 'Min 11 Karakter',
            'kontak.max' => 'Min 13 Karakter',
        ]);

        $tglbooking = \Carbon\Carbon::now()->format('ymd');
        if ($request->id_bisnis == 1) {
            echo $kode = 'VPR';
        } else {
            echo $kode = 'MHRC';
        }
        $koderandom = Str::random(4);
        $kodebooking = $tglbooking . $kode . $koderandom;

        $datapengunjung = DataPengunjung::create([
            'nik_paspor'    => '',
            'nm_pengunjung' => $request->nm_pengunjung,
            'tempat_lahir'  => '',
            'tanggal_lahir' => $request->tanggal_lahir ?: null,
            'alamat'        => '',
            'email'         => $request->email,
            'kontak'        => $request->kontak,
        ]);

        $id_pengunjung = $datapengunjung->id_pengunjung;
        $datareservasi = Reservasi::create([
            'id_bisnis'      => $request->id_bisnis,
            'id_pengunjung'  => $id_pengunjung,
            'id_typekamar'   => $request->id_typekamar,
            'jumlah_orang'   => $request->jumlah_orang,
            'jumlah_kamar'   => $request->jumlah_kamar,
            'checkin'        => $request->checkin,
            'checkout'       => $request->checkout,
            'kode_booking'   => $kodebooking,
            'total_harga'    => '',
            'status'         => '',
            'bukti_transfer' => '',
        ]);

        $hari = 0;
        $ambil = Reservasi::all()->where('id_reservasi', $datareservasi->id_reservasi);
        foreach ($ambil as $tanggal) {
            $tglcheckin = \Carbon\Carbon::parse($tanggal->checkin);
            $tglcheckout = \Carbon\Carbon::parse($tanggal->checkout);

            $hari += $tglcheckin->diffInDays($tglcheckout);
        }
        $totalharga = $tanggal->typekamar->harga * $tanggal->jumlah_kamar * $hari;

        $ambildata = Reservasi::findorfail($tanggal->id_reservasi);
        $ambildata->update([
            'id_bisnis'      => $tanggal->id_bisnis,
            'id_pengunjung'  => $tanggal->id_pengunjung,
            'id_typekamar'   => $tanggal->id_typekamar,
            'jumlah_orang'   => $tanggal->jumlah_orang,
            'jumlah_kamar'   => $tanggal->jumlah_kamar,
            'checkin'        => $tanggal->checkin,
            'checkout'       => $tanggal->checkout,
            'kode_booking'   => $tanggal->kode_booking,
            'total_harga'    => $totalharga,
            'status'         => '',
            'bukti_transfer' => '',
        ]);

        return back()->with('pesan', 'Data Reservasi Berhasil di Tambahkan!!!');
    }

    public function getedittypekamar(Request $request)
    {
        $id_bisnis = $request->edit_idbisnis;

        $typekamar = TypeKamar::where('id_bisnis', $id_bisnis)->get();

        $option = "<option>~ Pilih Type Kamar ~</option>";
        foreach ($typekamar as $id_typekamar) {
            $option .= "<option value='$id_typekamar->id_typekamar'> $id_typekamar->nm_typekamar</option>";
        }

        echo ($option);
    }

    public function editreservasi(Request $request, $id_reservasi)
    {
        $reservasi = Reservasi::findOrFail($id_reservasi);

        $reservasi->update([
            'id_bisnis'      => $request->edit_idbisnis,
            'id_pengunjung'  => $reservasi->id_pengunjung,
            'id_typekamar'   => $request->edit_idtypekamar,
            'jumlah_orang'   => $request->edit_jumlah_orang,
            'jumlah_kamar'   => $request->edit_jumlah_kamar,
            'checkin'        => $reservasi->checkin,
            'checkout'       => $reservasi->checkout,
            'kode_booking'   => $reservasi->kode_booking,
            'total_harga'    => '',
            'status'         => '',
            'bukti_transfer' => '',
        ]);

        $hari = 0;
        $ambil = Reservasi::all()->where('id_reservasi', $reservasi->id_reservasi);

        foreach ($ambil as $tanggal)
            $tglcheckin = \Carbon\Carbon::parse($tanggal->checkin);
        $tglcheckout = \Carbon\Carbon::parse($tanggal->checkout);

        $hari += $tglcheckin->diffInDays($tglcheckout);
        $totalharga = $tanggal->typekamar->harga * $tanggal->jumlah_kamar * $hari;

        $ambildata = Reservasi::findorfail($tanggal->id_reservasi);
        $ambildata->update([
            'id_bisnis'      => $ambildata->id_bisnis,
            'id_pengunjung'  => $ambildata->id_pengunjung,
            'id_typekamar'   => $ambildata->id_typekamar,
            'jumlah_orang'   => $ambildata->jumlah_orang,
            'jumlah_kamar'   => $ambildata->jumlah_kamar,
            'checkin'        => $ambildata->checkin,
            'checkout'       => $ambildata->checkout,
            'kode_booking'   => $ambildata->kode_booking,
            'total_harga'    => $totalharga,
            'status'         => '',
            'bukti_transfer' => '',
        ]);

        return back()->with('pesan', 'Data Reservasi Berhasil di Edit!!!');
    }

    public function detail($id_reservasi)
    {
        $booking = Reservasi::findOrFail($id_reservasi);

        return view('admin.pages.list.detail', compact('booking'));
    }

    public function editpengunjung(Request $request, $id_pengunjung)
    {
        $pengunjung = DataPengunjung::findOrFail($id_pengunjung);

        $pengunjung->update([
            'nik_paspor'    => $request->nik_paspor,
            'nm_pengunjung' => $request->nm_pengunjung,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'email'         => $request->email,
            'kontak'        => $request->kontak,
        ]);

        return back()->with('pesan', 'Data Pengunjung Berhasil di Edit');
    }

    public function editstatus(Request $request, $id_reservasi)
    {
        $reservasi = Reservasi::findOrFail($id_reservasi);

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
            'status'         => $request->status,
            'bukti_transfer' => $reservasi->bukti_transfer,
        ]);

        return back();
    }

    public function buktitransfer(Request $request, $id_reservasi)
    {
        $reservasi = Reservasi::findOrFail($id_reservasi);
        $pengunjung = DataPengunjung::where('id_pengunjung', $reservasi->id_pengunjung)->first();

        // validasi gambar
        $this->validate($request, [
            'bukti_transfer'    => 'required|mimes:png,jpg,jpeg|max:15728640',
        ], [
            'bukti_transfer.mimes' => 'gambar wajib berupa png, jpg, atau jpeg!!!'
        ]);

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

        return back();
    }
}
