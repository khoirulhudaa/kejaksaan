<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengawasanOrganisasi extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'nama',
        'status',
        'akta',
        'alamat',
        'pengurus',
        'kegiatan',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }

    public function organisasi()
    {
        return $this->belongsTo('App\Models\TIKOrganisasi');
    }
}
