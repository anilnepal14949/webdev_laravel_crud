<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        "product_name",
        "product_code",
        "product_details",
        "product_image"
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
