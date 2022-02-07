<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sdm extends Model
{
    protected $fillable = [
        'biodata_id',
        'locus',
        'kecamatan_id',
        'ket',
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
