<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;
    protected $table = 'images_products';

    protected $fillable = [
        'products_id',
        'path',
    ];

    public function produto()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
