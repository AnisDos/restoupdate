<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\Admin;



class Privilege extends Model
{

  
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }



public function admin()
{
    return $this->belongsToMany(Admin::class);
}





}
