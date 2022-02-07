<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TIKTerdakwa extends Model
{
    protected $fillable = [
        'nama',
        'panggilan',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'bangsa_id',
        'kewarganegaraan_id',
        'kecamatan_id',
        'alamat',
        'phone',
        'pasport',
        'agama_id',
        'pekerjaan_id',
        'alamat_kantor',
        'perkawinan_id',
        'kepartaian',
        'pendidikan_id',
        'kasus',
        'background',
        'no_skpp',
        'tgl_skpp',
        'putusan_pengadilan_pn',
        'putusan_pengadilan_pt',
        'putusan_pengadilan_ma',
        'nama_orangtua',
        'nama_kawan',
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
