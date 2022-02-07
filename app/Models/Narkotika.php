<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Narkotika extends Model
{
    protected $fillable = [
        'tgl',
        'biodata_id',
        'kecamatan_id',
        'locus',
        'pasal',
        'tgl_surat_pra_penuntutan',
        'nomor_surat_pra_penuntutan',
        'tgl_surat_penuntutan',
        'nomor_surat_penuntutan',
        'eksekusi',
        'upaya',
        'keterangan',
    ];

    public function biodata()
    {
        return $this->belongsTo('App\Models\TIKTerdakwa');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
