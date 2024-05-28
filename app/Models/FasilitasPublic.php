<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FasilitasPublic extends Model
{
    protected $table = "fasilitas_public";
    protected $primaryKey = "id_faspub";
    protected $fillable = [
        'id_faspub', 'id_bisnis', 'nm_faspub', 'estimasi', 'gmbr_faspub', 'link'
    ];

    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class, 'id_bisnis');
    }
}
