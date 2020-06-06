<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\Meal;
class WeekProgram extends Model
{
    
    protected $guarded =[];
  
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
  

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
  
  
}
