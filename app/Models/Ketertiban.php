<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ketertiban extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'direktorat',
        'jenis_masalah',
        'pokok_permasalahan',
        'sumber_informasi',
        'info',
        'perkembangan',
        'penyelesaian',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
