<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengawasanMedia extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'jenis_media',
        'tgl_publikasi',
        'pimpinan',
        'konten',
        'hasil',
        'tindak_lannjut',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }

    public function media()
    {
        return $this->belongsTo('App\Models\TIKMedia');
    }
}
