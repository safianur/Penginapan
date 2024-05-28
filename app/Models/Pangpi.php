<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pangpi extends Model
{
    protected $table = "pangpi";
    protected $primaryKey = "id_pangpi";
    protected $fillable = [
        'id_pangpi', 'tgl_pangpi', 'gmbr_pangpi'
    ];
    protected $dates = ['tgl_pangpi'];
}
