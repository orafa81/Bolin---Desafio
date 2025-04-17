<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'confectioneries_id',
        'name',
        'value',
        'description',
    ];

    public function confeitaria()
    {
        return $this->belongsTo(Confectionery::class);
    }

    public function imagens()
    {
        return $this->hasMany(ImageProduct::class);
    }
}
