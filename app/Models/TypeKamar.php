<?php

namespace App\Models;

use App\Models\Bisnis;
use App\Models\Reservasi;
use App\Models\FasilitasKamar;
use Illuminate\Database\Eloquent\Model;

class TypeKamar extends Model
{
    protected $table = "type_kamar";
    protected $primaryKey = "id_typekamar";
    protected $fillable = [
        'id_typekamar', 'id_bisnis', 'nm_typekamar', 'harga', 'stok_kamar', 'gmbr_typekamar'
    ];

    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class, 'id_bisnis');
    }

    public function fasilitas_kamar()
    {
        return $this->hasMany(FasilitasKamar::class);
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
