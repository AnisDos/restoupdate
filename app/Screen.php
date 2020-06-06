<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\Meal;


class Screen extends Model
{
    

    protected $guarded =[];
    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    
}
