<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TIKMedia extends Model
{
    protected $fillable = [
        'nama',
        'npwp',
        'jenis',
        'alamat',
        'phone',
        'nama_pimpinan',
        'penanggung_jawab',
        'ijin_usaha',
        'waktu',
        'daerah',
        'jumlah',
        'kecamatan_id',
        'kasus',
        'background',
        'tindakan',
        'tindakan_kejaksaan',
        'tindakan_kepolisian',
        'tindakan_kominfo',
        'tindakan_pengadilan',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
