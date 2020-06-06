<?php

namespace App;
use App\ProductVersion;
use App\Employee;
use App\Restaurant;


use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{


protected $guarded =[];

    
    public function productVersion()
    {
        return $this->belongsTo(ProductVersion::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
}
