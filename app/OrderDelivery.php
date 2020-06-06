<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Employee;
use App\deliveryCompany;


class OrderDelivery extends Model
{
    protected $guarded =[];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }



    public function deliveryCompany()
    {
        return $this->belongsTo(deliveryCompany::class);
    }
    

}
