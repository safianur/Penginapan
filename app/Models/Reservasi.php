<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = "reservasi";
    protected $primaryKey = "id_reservasi";
    protected $fillable = [
        'id_reservasi', 'id_bisnis', 'id_pengunjung', 'id_typekamar', 'jumlah_orang',
        'jumlah_kamar', 'checkin', 'checkout', 'kode_booking', 'total_harga', 'status', 'bukti_transfer'
    ];
    protected $date = ['checkin', 'checkout'];

    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class, 'id_bisnis');
    }

    public function pengunjung()
    {
        return $this->belongsTo(DataPengunjung::class, 'id_pengunjung');
    }

    public function typekamar()
    {
        return $this->belongsTo(TypeKamar::class, 'id_typekamar');
    }
}
