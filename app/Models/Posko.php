<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posko extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'posko',
        'masalah',
        'tindak_lanjut',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
