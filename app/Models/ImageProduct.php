<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{

    protected $table = 'images_products';

    protected $fillable = [
        'product_id',
        'path',
    ];

    public function produto()
    {
        return $this->belongsTo(Product::class);
    }
}
