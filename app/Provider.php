<?php

namespace App;
use App\ProductVersion;
use App\Restaurant;



use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded =[];

    
    public function productVersions()
      {
          return $this->hasMany(ProductVersion::class);
      }
    
public function restaurant()
{
    return $this->belongsTo(Restaurant::class);
}


}
