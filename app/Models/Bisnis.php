<?php

namespace App\Models;

use App\Models\User;
use App\Models\Wisata;
use App\Models\Gallery;
use App\Models\TypeKamar;
use App\Models\FasilitasPublic;
use Illuminate\Database\Eloquent\Model;

class Bisnis extends Model
{
    protected $table = "bisnis";
    protected $primaryKey = "id_bisnis";
    protected $fillable = [
        'id_bisnis', 'nm_bisnis', 'lokasi', 'alamat'
    ];

    public function typekamar()
    {
        return $this->hasMany(TypeKamar::class);
    }

    public function faspub()
    {
        return $this->hasMany(FasilitasPublic::class);
    }

    public function wisata()
    {
        return $this->hasMany(Wisata::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
