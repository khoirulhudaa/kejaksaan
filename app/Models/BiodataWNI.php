<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataWNI extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'bangsa_id',
        'kewarganegaraan',
        'kecamatan',
        'alamat',
        'phone',
        'agama_id',
        'pendidikan_id',
        'pekerjaan_id',
        'alamat_kantor',
        'perkawinan_id',
        'legitimasi_perkawinan',
        'tempat_perkawinan',
        'tanggal_perkawinan',
    ];

    public function bangsa()
    {
        return $this->belongsTo('App\Models\SukuBangsa');
    }

    public function agama()
    {
        return $this->belongsTo('App\Models\Agama');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Models\Pendidikan');
    }

    public function pekerjaan()
    {
        return $this->belongsTo('App\Models\Pekerjaan');
    }

    public function perkawinan()
    {
        return $this->belongsTo('App\Models\StatusPerkawinan');
    }
}
