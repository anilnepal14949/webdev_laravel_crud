<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [
        "category_name",
        "category_slug",
        "category_description",
        "category_image"
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
