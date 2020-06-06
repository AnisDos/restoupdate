<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\Order;

class Customer extends Model
{
    

protected $guarded =[];

  public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    
 public function orders()
 {
     return $this->hasMany(Order::class);
 }


}
