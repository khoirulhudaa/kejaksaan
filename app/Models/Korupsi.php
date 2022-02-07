<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Korupsi extends Model
{
    protected $fillable = [
        'tgl',
        'biodata_id',
        'kecamatan_id',
        'locus',
        'pasal',
        'penyelidikan',
        'tgl_surat_kejaksaan',
        'nomor_surat_kejaksaan',
        'tgl_surat_polri',
        'nomor_surat_polri',
        'penuntutan',
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
