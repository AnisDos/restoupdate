<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Restaurant;
use App\TaskList;
use App\Admin;
use App\SuperAdmin;
use App\Employee;



class Task extends Model
{
    
    protected $guarded =[];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class);
    }


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function tasklists()
    {
        return $this->hasMany(TaskList::class);
    }


}
