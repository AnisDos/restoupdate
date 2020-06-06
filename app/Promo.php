<?php

namespace App;
use App\Admin;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    
protected $guarded =[];
 
 public function admin()
 {
     return $this->belongsTo(Admin::class);
 }

 public function orders()
 {
     return $this->hasMany(Order::class);
 }

 
}
