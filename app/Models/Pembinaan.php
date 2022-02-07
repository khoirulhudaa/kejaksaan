<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembinaan extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'direktorat',
        'peserta',
        'waktu',
        'tempat',
        'materi',
        'jumlah_peserta',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
