<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Reservasi;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataPengunjung extends Authenticatable
{
    use Notifiable;

    protected $table = "data_pengunjung";
    protected $primaryKey = "id_pengunjung";
    protected $fillable = [
        'id_pengunjung', 'nik_paspor', 'nm_pengunjung', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'email', 'kontak'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
