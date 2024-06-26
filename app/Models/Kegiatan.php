<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatan";
    protected $primaryKey = "id_kegiatan";
    protected $fillable = [
        'id_kegiatan', 'tgl_kegiatan', 'nm_kegiatan', 'pengada_kegiatan', 'gmbr_kegiatan'
    ];
    protected $dates = ['tgl_kegiatan'];
}
