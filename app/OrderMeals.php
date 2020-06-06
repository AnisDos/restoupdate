<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Meal;


class OrderMeals extends Model
{
    protected $guarded =[];


    public function order()
        {
            return $this->belongsTo(Order::class);
        }

        public function meal()
        {
            return $this->belongsTo(Meal::class);
        }



}
