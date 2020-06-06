<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Provider;
use App\TransactioHistory;




class ProductVersion extends Model
{
    protected $guarded =[];

  public function product()
  {
      return $this->belongsTo(Product::class);
  }

  
public function provider()
{
    return $this->belongsTo(Provider::class);
}


  public function transactioHistories()
  {
      return $this->hasMany(TransactioHistory::class);
  }


  
}
