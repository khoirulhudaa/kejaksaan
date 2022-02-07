<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengawasanKeagamaan extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'nama',
        'pimpinan',
        'kegiatan',
        'jumlah_pengikut',
        'nomor_pendaftaran',
        'tgl_pendaftaran',
        'nomor_badan',
        'tgl_badan',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
