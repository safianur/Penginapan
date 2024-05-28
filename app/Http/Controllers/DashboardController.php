<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservasi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $bulan = Carbon::now()->month;
        $DataTamu = Reservasi::where('bukti_transfer', '')->whereRaw('MONTH(CheckOut) = ?', [$bulan])->groupBy(DB::raw('MONTH(CheckOut)'))->count();
        $DataPemesanan = Reservasi::where('status', '')->where('bukti_transfer', '!=', '')->whereRaw('MONTH(CheckOut) = ?', [$bulan])->groupBy(DB::raw('MONTH(CheckOut)'))->count();
        $DataCheckIn = Reservasi::where('status', 'CheckIn')->whereRaw('MONTH(CheckOut) = ?', [$bulan])->groupBy(DB::raw('MONTH(CheckOut)'))->count();
        $DataCheckOut = Reservasi::where('status', 'CheckOut')->whereRaw('MONTH(CheckOut) = ?', [$bulan])->groupBy(DB::raw('MONTH(CheckOut)'))->count();

        // format chart
        $bulan = [];
        $reservasi = Reservasi::select(DB::raw("MONTHNAME(CheckOut) as bulan"))->GroupBy(DB::raw('MONTHNAME(CheckOut)'))->pluck('bulan');
        foreach ($reservasi as $rsc) {
            $bulan[] = Carbon::parse("1 $rsc")->translatedFormat('F');
            $totaldata = Reservasi::select(DB::raw("CAST(SUM(total_harga) as int) as total"))->groupBy(DB::raw("MONTH(CheckOut)"))->pluck('total');
        }
        return view('admin.pages.dashboard', compact('DataTamu', 'DataPemesanan', 'DataCheckIn', 'DataCheckOut', 'bulan', 'totaldata'));
    }
}
