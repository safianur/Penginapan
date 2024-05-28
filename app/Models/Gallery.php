<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = "gallery";
    protected $primaryKey = "id_gallery";
    protected $fillable = [
        'id_gallery', 'id_bisnis', 'nm_gallery', 'keterangan_gallery', 'gmbr_gallery'
    ];

    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class, 'id_bisnis');
    }
}
