<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confectionery extends Model
{
    protected $fillable = [
        'name',
        'cep',
        'road',
        'number',
        'neighborhood',
        'city',
        'state',
        'telephone',
        'latitude',
        'longitude',
    ];

    public function produtos()
    {
        return $this->hasMany(Product::class, 'confectioneries_id');
    }
}
