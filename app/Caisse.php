<?php

namespace App;
use App\Restaurant;

use App\Employee;


use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    

    protected $guarded =[];
    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    



}
