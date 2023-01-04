<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Product extends Model
{
    use HasFactory, Favoriteable;
    protected $fillable = [
        'user_id',
        'product_name',
        'detail',
        'product_image',
        'price',
        'stock',
    ];

    // 1つの商品が1人のユーザーに紐づく
    public function user() {
       return $this->belongsTo(User::class);
   }
}
