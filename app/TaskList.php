<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class TaskList extends Model
{
   
   
protected $guarded =[];

public function task()
{
    return $this->belongsTo(Task::class);
}

}
