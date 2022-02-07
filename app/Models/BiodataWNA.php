<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiodataWNA extends Model
{
    protected $fillable = [
        'pasport',
        'name',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Negara');
    }
}
