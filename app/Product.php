<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Ingridient;
use App\Admin;
use App\ProductVersion;
use App\Restaurant;


class Product extends Model
{
    protected $guarded =[];

    
public function ingredients()
  {
      return $this->hasMany(Ingredient::class);
  }

  public function admin()
  {
      return $this->belongsTo(Admin::class);
  }

  public function restaurant()
  {
      return $this->belongsTo(Restaurant::class);
  }

 


  public function productVersions()
  {
      return $this->hasMany(ProductVersion::class);
  }

}
