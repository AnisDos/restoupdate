<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\category;
use App\Ingridient;
use App\OrderMeals;
use App\WeekProgram;
use App\Screen;
class Meal extends Model
{
    protected $guarded =[];


    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function orderMeals()
    {
        return $this->hasMany(OrderMeals::class);
    }


public function weekProgram()
  {
      return $this->hasOne(WeekProgram::class);
  }
    

  public function screen()
  {
      return $this->belongsTo(Screen::class);
  }
  
  

}
