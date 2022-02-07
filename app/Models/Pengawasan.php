<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengawasan extends Model
{
    protected $fillable = [
        'tgl',
        'negara_id',
        'orang_asing',
        'tk',
        'mhs',
        'peneliti',
        'keluarga',
        'pendatang_ilegal',
        'usaha',
        'sosbud',
        'wisata',
        'keterangan',
    ];

    public function biodata()
    {
        return $this->belongsTo('App\Models\BiodataWNA');
    }
}
