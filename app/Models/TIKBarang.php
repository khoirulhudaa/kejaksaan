<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TIKBarang extends Model
{
    protected $fillable = [
        'nama',
        'penerbit',
        'pengarang',
        'waktu',
        'daerah',
        'pencetak',
        'nama_pimpinan',
        'alamat_penerbit',
        'alamat_pencetak',
        'jumlah_oplah',
        'kecamatan',
        'kasus',
        'background',
        'tindakan',
        'tindakan_kejaksaan',
        'tindakan_kepolisian',
        'tindakan_pengadilan',
        'keterangan',
    ];
}
