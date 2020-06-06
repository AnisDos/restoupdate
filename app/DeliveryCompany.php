<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\Charge;
use App\OrderDelivery;
    

class DeliveryCompany extends Model
{
    

protected $guarded =[];

  public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }


    
public function charges()
 {
     return $this->hasMany(Charge::class);
 }


 public function orderDeliveries()
 {
     return $this->hasMany(OrderDelivery::class);
 }




}
