<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;

class Key extends Model
{
    protected $guarded =[];
public function admin()
{
    return $this->belongsTo(Admin::class);
}


}
