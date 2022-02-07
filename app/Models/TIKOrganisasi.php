<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TIKOrganisasi extends Model
{
    protected $fillable = [
        'nama',
        'akte',
        'status',
        'berdiri',
        'alamat',
        'phone',
        'web',
        'nama_pengurus',
        'kedudukan_pengurus',
        'periode_pengurus',
        'alamat_pengurus',
        'hp_pengurus',
        'kegiatan_kedalam',
        'kegiatan_keluar',
        'kegiatan',
    ];
}
