<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Category;

class Ingredient extends Model
{


    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
