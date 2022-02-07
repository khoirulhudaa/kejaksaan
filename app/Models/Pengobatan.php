<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengobatan extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'nama_klinik',
        'alamat',
        'identitas',
        'konten',
        'jumlah_pembantu',
        'sumber_informasi',
        'asal_mula',
        'cara',
        'nomor_ijin',
        'tgl_ijin',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
