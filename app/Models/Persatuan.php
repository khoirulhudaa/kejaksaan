<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persatuan extends Model
{
    protected $fillable = [
        'locus',
        'kecamatan_id',
        'ket',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
    }
}
