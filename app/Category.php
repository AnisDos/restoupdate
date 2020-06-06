<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Meal;
use App\Admin;
use App\Restaurant;

class Category extends Model
{
    protected $guarded =[];




    
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }


    
public function admin()
{
    return $this->belongsTo(Admin::class);
}


    
public function restaurant()
{
    return $this->belongsTo(Restaurant::class);
}





}
