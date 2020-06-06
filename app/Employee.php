<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

use App\Privilege;
use App\TransactionHistory;
use App\Charge;
use App\User;
use App\Caisse;
use App\OrderDelivery;
    
use App\Task;



class Employee extends Model
{

    //protected $guarded =[];
  //  use Notifiable;

    //protected $guard = 'employee';

   // protected $table = 'employees';

    protected $guarded =[];


   
    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function privileges()
    {
        return $this->belongsToMany(Privilege::class);
    }

  
    
    public function transactionHistories()
    {
        return $this->hasMany(TransactionHistory::class);
    }

    
public function charges()
 {
     return $this->hasMany(Charge::class);
 }

 public function caisses()
 {
     return $this->hasMany(Caisse::class);
 }


 public function orderDeliveries()
 {
     return $this->hasMany(OrderDelivery::class);
 }


         

 public function tasks()
 {
     return $this->hasMany(Task::class);
 }



}
