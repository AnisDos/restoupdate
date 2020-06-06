<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Restaurant;

use App\Key;
use App\Product;
use App\Category;
use App\Privilege;
use App\Promo;
use App\Task;



class Admin extends Model
{
    
protected $guarded =[];
  
  public function user()
  {
      return $this->belongsTo(User::class);
  }



  
  public function restaurants()
  {
      return $this->hasMany(Restaurant::class);
  }


  
public function categories()
  {
      return $this->hasMany(Category::class);
  }


  
public function products()
  {
      return $this->hasMany(Product::class);
  }


  


    
public function privileges()
{
    return $this->belongsToMany(Privilege::class);
}

     
  public function keys()
  {
      return $this->hasMany(Key::class);
  }





  public function promos()
  {
      return $this->hasMany(Promo::class);
  }


       

  public function tasks()
  {
      return $this->hasMany(Task::class);
  }


  
}
