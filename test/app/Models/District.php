<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'dis_name',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function subdistrict()
    {
        return $this->hasMany('App\Models\Subdistrict');
    }
}
