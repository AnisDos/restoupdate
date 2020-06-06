<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Promo;
use App\Caisse;
use App\OrderDelivery;
use App\OrderMeals;


class Order extends Model
{
    protected $guarded =[];

  public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }



    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }

        
    public function orderDelivery()
    {
        return $this->hasOne(OrderDelivery::class);
    }


    public function orderMeals()
    {
        return $this->hasMany(OrderMeals::class);
    }
  

}
