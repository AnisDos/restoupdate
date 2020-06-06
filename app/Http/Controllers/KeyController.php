<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Key;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class KeyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function chekKeyForm() 
    {  
        $data = request()->validate([
            
            'pinKey'=>  'required',
        ]);

$chekKey = Key::where('admin_id',Auth::user()->admin->id)
                ->where("restaurant_key",$data['pinKey'])
                ->where('date_experation', '>', Carbon::now())
                ->exists();


                if ($chekKey) {
                
                  
                   $u = Admin::find(Auth::user()->admin->id);
                   $u->verified = true;
                   $u->save();
                   return redirect('admin')->with("success","your acount is activated make some delicious food !");

                
                } else {
                    return redirect()->back()->with("success"," riyah ma t9owed roh djib cle !");
                }
                



        }


}
