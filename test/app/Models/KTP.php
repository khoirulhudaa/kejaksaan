<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    protected $fillable = [
        'prov_id',
        'city_id',
        'dis_id',
        'subdis_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'status_perkawinan',
        'keterangan',
        'photo',
    ];

    public function getProvince()
    {
        return $this->belongsTo(Province::class, 'prov_id');
    }
    public function getCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function getDistrict()
    {
        return $this->belongsTo(District::class, 'dis_id');
    }
    public function getSubdistrict()
    {
        return $this->belongsTo(Subdistrict::class, 'subdis_id');
    }
}
