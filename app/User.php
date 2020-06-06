<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use App\Employee;
use App\SuperAdmin;
use App\Admin;
use App\Restaurant;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function superAdmin()
  {
      return $this->hasOne(SuperAdmin::class);
  }

  public function admin()
  {
      return $this->hasOne(Admin::class);
  }
    

  public function restaurant()
  {
      return $this->hasOne(Restaurant::class);
  }

    
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
  
  



 

}
