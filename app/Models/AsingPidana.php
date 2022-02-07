<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsingPidana extends Model
{
    protected $fillable = [
        'tgl',
        'biodata_id',
        'locus',
        'tidak_pidana',
        'tahapan_dik',
        'tahapan_pratut',
        'tahapan_tut',
        'tahapan_eksekusi',
        'keterangan',
    ];

    public function biodata()
    {
        return $this->belongsTo('App\Models\BiodataWNA');
    }
}
