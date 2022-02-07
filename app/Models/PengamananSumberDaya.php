<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengamananSumberDaya extends Model
{
    protected $fillable = [
        'kecamatan_id',
        'tgl',
        'sumber_informasi',
        'opsin_lid',
        'opsin_pam',
        'opsin_gal',
        'nomor_surat',
        'tgl_surat',
        'hasil',
        'keterangan',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
