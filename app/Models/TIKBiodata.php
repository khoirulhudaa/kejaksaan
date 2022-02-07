<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TIKBiodata extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'bangsa',
        'kewarganegaraan',
        'kecamatan',
        'alamat',
        'phone',
        'pasport',
        'agama',
        'pendidikan',
        'pekerjaan',
        'alamat_kantor',
        'perkawinan',
        'legitimasi_perkawinan',
        'tempat_perkawinan',
        'tanggal_perkawinan',
        'riwayat_pekerjaan',
        'riwayat_pendidikan',
        'riwayat_kepartaian',
        'riwayat_ormas',
        'nama_istri',
        'nama_anak',
        'nama_saudara',
        'nama_ayah_kandung',
        'alamat_ayah_kandung',
        'nama_ibu_kandung',
        'alamat_ibu_kandung',
        'nama_ayah_mertua',
        'alamat_ayah_mertua',
        'nama_ibu_mertua',
        'alamat_ibu_mertua',
        'nama_kenalan_pertama',
        'alamat_kenalan_pertama',
        'nama_kenalan_kedua',
        'alamat_kenalan_kedua',
        'nama_kenalan_ketiga',
        'alamat_kenalan_ketiga',
        'hobi',
        'kedudukan',
        'lain',
    ];

    public function bangsa()
    {
        return $this->belongsTo('App\Models\SukuBangsa');
    }

    public function kewarganegaraan()
    {
        return $this->belongsTo('App\Models\WargaNegara');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan');
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
