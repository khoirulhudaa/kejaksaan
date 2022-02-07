<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencegahan extends Model
{
    protected $fillable = [
        'tgl',
        'biodata_id',
        'kecamatan_id',
        'nomor_pencegahan',
        'tgl_pencegahan',
        'locus',
        'pasal',
        'nomor_kepja',
        'tgl_kepja',
        'tgl_mulai',
        'tgl_akhir',
        'keterangan',
    ];

    public function biodata()
    {
        return $this->belongsTo('App\Models\BiodataWNI');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
