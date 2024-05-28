<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = "wisata";
    protected $primaryKey = "id_wisata";
    protected $fillable = [
        'id_wisata', 'id_bisnis', 'nm_wisata', 'estimasi', 'gmbr_wisata', 'link'
    ];

    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class, 'id_bisnis');
    }
}
