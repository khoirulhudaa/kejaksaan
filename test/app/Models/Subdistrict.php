<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $fillable = [
        'subdis_name',
        'dis_id'
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'dis_id', 'id');
    }
}
