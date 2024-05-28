<?php

namespace App\Models;

use App\Models\TypeKamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FasilitasKamar extends Model
{
    protected $table = "fasilitas_kamar";
    protected $primaryKey = "id_faskam";
    protected $fillable = [
        'id_faskam', 'id_typekamar', 'nm_faskam', 'jumlah_faskam'
    ];

    public function typekamar()
    {
        return $this->belongsTo(TypeKamar::class, 'id_typekamar');
    }
}
