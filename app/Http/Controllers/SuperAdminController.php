<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Privilege;
use Carbon\Carbon;
use App\Key;
use App\Admin;
use App\SuperAdmin;
use Image;
use App\Employee;
use Illuminate\Support\Facades\DB;


use App\Task;
use App\TaskList;
class SuperAdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','issuperadmin']);
    }



    public function index()
    {


//partie chart===================================================================
//$chart = [];

$charts = array();
$chartsExpenses = array();
$chartsOrders = array();


//$restaurants = User::where('is_admin',true)->where('id','!=',Auth::user()->id)->get();

$restaurants = Admin::where('active' , true)->get();
// feach all restaurant of this admin and try yo evry one put there name end revuen of year
foreach($restaurants as $restaurant){
    //$allrestaurants = User::where('user_id', $restaurant->id)->where('id','!=', $restaurant->id)->get();
    $allrestaurants = $restaurant->restaurants()->get();
    // feach all restaurant of this admin and try yo evry one put there name end revuen of year
   
    $mounthEvryRes = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $mounthEvryResExpenses = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $mounthEvryResOrders = array(0,0,0,0,0,0,0,0,0,0,0,0);
    foreach($allrestaurants as $allrestaurant){
        $year = carbon::now()->year;
        $tz = 'Europe/Madrid';
       $mounth = array();
        for ($i=1; $i <13 ; $i++) { 
        $order = DB::table('orders')
       /*    ->select('orders.*') */
        ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
        ->where('caisses.restaurant_id', $allrestaurant->id )
        ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
        ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
        ->where('orders.orderStatus',"completed")
        ->sum('orders.priceOrder');
       
        array_push($mounth,  $order);
       }

       //--------------------------------------//
       $mounthexpeses = array();
       for ($i=1; $i <13 ; $i++) { 
        $expeses = DB::table('charges')
        ->where('charges.restaurant_id', $allrestaurant->id )
        ->where('charges.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
        ->where('charges.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
        ->sum('charges.priceCharge');
       
        array_push($mounthexpeses,  $expeses);
       }
       //--------------------------------------//
       $mounthorders = array();
       for ($i=1; $i <13 ; $i++) { 
       $orderch = DB::table('orders')
      /*    ->select('orders.*') */
       ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
       ->where('caisses.restaurant_id', $allrestaurant->id )
       ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
       ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
       ->where('orders.orderStatus',"completed")
       ->count('*');
      
       array_push($mounthorders,  $orderch);
      }

      //--------------------------------------//
         //for evry res of admin add resultat of evry mounth
       for ($j=0; $j <12 ; $j++) {
        $mounthEvryRes[$j] =  $mounthEvryRes[$j] + $mounth[$j];
        }
      //--------------------------------------//
        //for evry res of admin add resultat of evry mounth
        for ($j=0; $j <12 ; $j++) {
            $mounthEvryResExpenses[$j] =  $mounthEvryResExpenses[$j] + $mounthexpeses[$j];
            }
        //--------------------------------------//
     //for evry res of admin add resultat of evry mounth
     for ($j=0; $j <12 ; $j++) {
        $mounthEvryResOrders[$j] =  $mounthEvryResOrders[$j] + $mounthorders[$j];
        }
      //--------------------------------------//

    }
    

    array_push($charts,  array( $restaurant->name,$mounthEvryRes));
    array_push($chartsExpenses,  array( $restaurant->name,$mounthEvryResExpenses));
    array_push($chartsOrders,  array( $restaurant->name,$mounthEvryResOrders));


 

}

//end partie charts===================================================================


//home boites===================================================================
$year = Carbon::now()->year;
$tz = 'Europe/Madrid';
//totalCustomers in this year
$totalCustomers   = DB::table('customers')
->where('customers.created_at', '>=', Carbon::createFromDate($year, 1,0, $tz) )
->where('customers.created_at', '<',Carbon::createFromDate($year, 12,31, $tz) )
->count();




//totalAdminActives
$totalAdminActives = Admin::where('active',true)->count();

$totalRestauransActives = DB::table('restaurants')
->leftJoin('admins',  'restaurants.admin_id', '=','admins.id')
->where('admins.active', true)
->count();

$totalEmployeesActives = DB::table('employees')
->leftJoin('restaurants',  'restaurants.id', '=','employees.restaurant_id')
->leftJoin('admins',  'restaurants.admin_id', '=','admins.id')
->where('admins.active', true)
->count();
//home boites===================================================================
  //  dd($totalCustomers,$totalAdminActives,$totalRestauransActives,$totalEmployeesActives);


  
  $tasks = Auth::user()->superAdmin->tasks()->get();





        return view('superadmin.home', compact('tasks','chartsOrders','chartsExpenses','charts','totalCustomers','totalAdminActives','totalRestauransActives','totalEmployeesActives'));

    }

    

    

    public function generatekey()
    {  //test get restaurant who dont have key valid
//======================================end test===============================================
        /* $users = DB::table('users')
            ->where(function ($query) {
                $query ->leftJoin('keys', 'users.id', '=', 'keys.user_id')
                ->select('users.*')
                ->where('users.id','!=', Auth::user()->id)
                ->where('users.is_admin', true)
                ->Where('keys.date_experation', '<', Carbon::now());
            })
            ->orWhere(function ($query) {
                $query->leftJoin('keys', 'users.id', '=', 'keys.user_id')
                ->select('users.*')
                ->where('users.id','!=', 'keys.user_id');
            })
            ->get(); */

//======================================end test===============================================
            $users = DB::table('admins')
            ->select('admins.*','users.email')
            ->join('users', 'admins.user_id', '=', 'users.id')
            ->whereNotExists( function ($query)  {
                $query->select(DB::raw(1))
                ->from('keys')
                ->whereRaw('admins.id = keys.admin_id')
                ->Where('keys.date_experation', '>', Carbon::now());
            })
       /*      ->orWhereExists(function ($query) {
                $query ->select(DB::raw(1))
                ->from('keys')
                ->whereRaw('users.id = keys.user_id')
                ->Where('keys.date_experation', '<', Carbon::now());
            }) */
            ->get();
        $allprivileges = Privilege::all();

  
        $tasks = Auth::user()->superAdmin->tasks()->get();

        //$users = User::where('id','!=', Auth::user()->id)->where('is_admin', true)->get();
        $keyValue = "" ;
    
        return view('superadmin.generatekey',compact('users','keyValue','allprivileges','tasks') );

    }



    public function generatekeyform() 
    {
       
        $data = request()->validate([
            'id_restaurant' => 'required',
            'typeAb' => 'required',
            'priceKey'=> 'required',
            'var'=>  '',
        ]);

    

                //put string geted from form too a array 
                $dataprivileges= preg_split("/[,]/",$data['var'][0]);


                $stack = array();
                
                for ($i=0; $i < count($dataprivileges) ; $i++) { 
                
                    if(!in_array($dataprivileges[$i], $stack))
                {
                  
                    array_push($stack, $dataprivileges[$i]);
                
                }
                
                }
                
                
                             $restaurant = Admin::find($data['id_restaurant']);	
                
                     //delete restaurant privilege and recreate theme
                
                     $restaurant->privileges()->detach();
                  
                     
                         //create restaurant privilege of meal
                   
                
                         if ($stack[0] != "" ) {
                   
                           
                            $restaurant->privileges()->attach($stack);
                
                        
                        
                        }
//generate key 
                        do
                        {
                            
                            $random_string = md5(microtime());
                            $token = $restaurant->id;
                            $random_string= substr($random_string, 0, -12);
                            $tok= substr($restaurant->name, 0, -3);
                            //delete espase
                            $tok = str_replace(' ', '', $tok);
                            $restaurant_key = $random_string . $token . '-'. $tok  . '-'. strftime(time());
                            $user_code = Key::where('restaurant_key', $restaurant_key)->get();
                        }
                        while(!$user_code->isEmpty());

                        $mounth = 0;
                        if ($data['typeAb'] == "3") {
                            $mounth = 3;
                        } else {
                            if ($data['typeAb'] == "6") {
                                $mounth = 6;
                            } else {
                                $mounth = 12;
                            }
                            
                           
                        }
                        
                        $date_experation = Carbon::now()->addMonths($mounth);

      

        $restaurant->keys()->create([
            
            'restaurant_key'=>  $restaurant_key,
            'priceKey'=>  $data['priceKey'],
            'date_experation'=>  $date_experation,
            
        ]);
                

        return redirect()->back()->with("success"," key added to Restaurant with success !");

    }


    

    public function showRestaurantWithKey()
    {
        //$users = User::all();
        $users = DB::table('admins')
        ->select('admins.*','users.email','keys.*')
        ->join('keys', 'admins.id', '=', 'keys.admin_id')
        ->join('users', 'admins.user_id', '=', 'users.id')
        /* ->Where('keys.date_experation', '>', Carbon::now()) */
        ->get();
    
        $tasks = Auth::user()->superAdmin->tasks()->get();
        return view('superadmin.showRestaurantWithKey',compact('users','tasks') );

    }

    
    public function showRestaurantAllInfo()
    {
        //$users = User::all();
       /*  $users = DB::table('users')
        ->join('keys',  'keys.user_id', '=','users.id')
        ->where('users.id','!=', Auth::user()->id)
        ->where('users.is_admin', true)
        ->groupBy('users.id')
        ->get(); */
        $users = DB::table('admins')
        ->select('admins.*','users.email','keys.*')
        ->join('keys', 'admins.id', '=', 'keys.admin_id')
        ->join('users', 'admins.user_id', '=', 'users.id')
        /* ->Where('keys.date_experation', '>', Carbon::now()) */
        ->get();
        //dd($users);
    
        $tasks = Auth::user()->superAdmin->tasks()->get();
        return view('superadmin.showRestaurantAllInfo',compact('users','tasks') );

    }


    

    public function showRestaurantAllInfoByOne(Admin $user)
    {
        //partie chart===================================================================
$charts = array();
$restaurants = $user->restaurants()->get();
// feach all restaurant of this admin and try yo evry one put there name end revuen of year
foreach($restaurants as $restaurant){
   $year = 2020;
   $tz = 'Europe/Madrid';
$mounth = array();
   for ($i=1; $i <13 ; $i++) { 
   $order = DB::table('orders')
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.restaurant_id', $restaurant->id )
   ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('orders.priceOrder');
   array_push($mounth,  $order);
}
   array_push($charts,  array( $restaurant->name,$mounth));
}
//end partie charts===================================================================


/// partie chart orders===============================================================
$chartOrders = array();

$year = carbon::now()->year;
$tz = 'Europe/Madrid';
$rests = $user->restaurants()->get();

//$mounth = array();

foreach($rests as $restaurant){
    $mounth =array();
for ($i=1; $i <13 ; $i++) { 

   
$order = DB::table('orders')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
->where('restaurants.id',$restaurant->id)
->where('orders.orderStatus',"completed")
->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
->count('*');

array_push($mounth, $order );


}
array_push($chartOrders, array( $restaurant->name,$mounth) );

}
//dd($chartOrders);
//end partie chart orders=============================================================






      /*   if (!$user->admin->exists()) {
            return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");

        }  */

/* 
      
            $someInfoEmployees = DB::table('employees')
            ->select('employees.*','us1.name','us1.is_admin')
            ->leftJoin('users as us1',  'us1.id', '=','employees.user_id')
            ->leftJoin('users as us2',  'us2.id', '=','us1.user_id')
            ->where('us2.id','!=', Auth::user()->id)
            ->where('us2.id', $user->id)
            ->get(); */


            
            $someInfoEmployees = DB::table('employees')
            ->select('employees.*','restaurants.name','users.email')
            ->rightJoin('users',  'users.id', '=','employees.user_id')
            ->leftJoin('restaurants',  'restaurants.id', '=','employees.restaurant_id')
            ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
            ->where('admins.id', $user->id)
            ->get();
    
       
        //$restaurants =  User::where('user_id',$user->id)->get();
        $restaurants = $user->restaurants()->get();

        $allprivileges =array();
        //privilege he doesn't have
        $privileges = Privilege::all();
        //$myprivileges = $user->privileges()->get();
        foreach($privileges as $pr){

           if(!$user->privileges->contains($pr->id)){
            array_push($allprivileges,  $pr);
        }
        }

      //  dd($allprivileges);
        
      $tasks = Auth::user()->superAdmin->tasks()->get();
        //dd($someInfoEmployees);
        return view('superadmin.showRestaurantAllInfoByOne',compact('tasks','chartOrders','charts','user','someInfoEmployees','restaurants','allprivileges') );

    }







    




    public function showRevenu()
    {
        

        $revenus = array();
        //  $year = 2020;
        $year = Carbon::now()->year;
        $tz = 'Europe/Madrid';
     
     $mounth = array();
        for ($i=1; $i <13 ; $i++) { 
        
     
        $order = DB::table('keys')
        ->where('keys.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
        ->where('keys.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
        ->sum('keys.priceKey');
     
     
     
        array_push($mounth,  $order);
     
        }

        
        array_push($revenus,  array( "revenus",$mounth));

        $tasks = Auth::user()->superAdmin->tasks()->get();

        return view('superadmin.showRevenu',compact('revenus','tasks') );

    }




    public function showtotalecompte()
    {
        

        //totale compte
        //$totalcomptes = User::where('id','!=',Auth::user()->id)->where('is_admin',true)->count();
        $totalcomptes = Admin::count();
        //coumpte activi
       /*  $activcoupmtes = User::where('id','!=',Auth::user()->id)
                          ->where('is_admin',true)
                          ->where('verified',true)
                          ->count(); */
                          $activcoupmtes = Admin::
                          where('verified',true)
                          ->count();
        //compte deactive
        $deactuvcomptes = $totalcomptes -  $activcoupmtes;
        //compte never get key 
        $nokeycoupmtes =  DB::table('admins')
        ->whereNotExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('keys')
            ->whereRaw('admins.id = keys.admin_id');
        })
        ->count();
        //compte khlasetlhom abonnement
        $expirkeycoupmtes =  DB::table('admins')
        ->where('verified',false)
        ->whereExists( function ($query)  {
            $query->select(DB::raw(1))
            ->from('keys')
            ->whereRaw('admins.id = keys.admin_id');
        })
        ->count();

        $tasks = Auth::user()->superAdmin->tasks()->get();
//dd($totalcomptes,$activcoupmtes,$nokeycoupmtes,$deactuvcomptes,$expirkeycoupmtes);
        return view('superadmin.showtotalecompte',compact('tasks','activcoupmtes','expirkeycoupmtes','nokeycoupmtes') );

    }


    

    public function adminUpdatePrivileges() {
        
       
        $data = request()->validate([
            'id_admin' => 'required',
            'var'=>  '',
        ]);

    

                //put string geted from form too a array 
                $dataprivileges= preg_split("/[,]/",$data['var'][0]);


                $stack = array();
                
                for ($i=0; $i < count($dataprivileges) ; $i++) { 
                
                    if(!in_array($dataprivileges[$i], $stack))
                {
                  
                    array_push($stack, $dataprivileges[$i]);
                
                }
                
                }

           
                if ($stack[0] == "" ) {
                    return redirect()->back()->with("danger"," empty privileges ! ");
            }
             
               
                
                             $restaurant = Admin::find($data['id_admin']);	
               
                  
                     
                         //create restaurant privilege of meal
                   
                
                         if ($stack[0] != "" ) {
                   
                           
                            $restaurant->privileges()->attach($stack);
                
                        
                        
                        }



                        return redirect()->back()->with("success","  key added to Restaurant with success !! ");

                       
                        
                      

                

    }

    public function accountsettings(SuperAdmin $superadmin) 
    {

        if(auth::user()->superadmin->id != $superadmin->id){

            return redirect()->back()->with("danger"," You try to do a danger things be careful I will punish you ! ");

        }


        $tasks = Auth::user()->superAdmin->tasks()->get();
        return view('superadmin.accountsettings',compact('superadmin','tasks') );



    }



    public function updateSuperadminInfo(){
        $data = request()->validate([
            'id_res'=> '',
            'name' => 'required|min:3|max:50',
            //'email' => 'unique:users'.request()['email'],
           // 'email'=>'',
           'email' => ['required','email', \Illuminate\Validation\Rule::unique('users')->ignore(request()['id_res'])],
           // 'password' => 'confirmed|min:6',
        
            'image' => '',
        ]);
    

       
        
      
     
        if (request('image') != null){
          
            $imagePath = request('image')->store('users','public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
           
            $image->save();
           
        }
      
    
    
    
        $superadmin = SuperAdmin::find(Auth::user()->superadmin->id);
        $compte = User::find(Auth::user()->id);
        $superadmin->name = $data['name'];
    
        $compte->email = $data['email'];
        if (request('image') != null){$superadmin->image = $imagePath;}
        
        $superadmin->save();
        $compte->save();
    
        return redirect()->back()->with("success","SuperAdmin information Updated with success !! ");
    
    
    }

    public function updatePasswordSuperadmin()
    {
    
        
        $data = request()->validate([
            'id_res'=> '',
            'Activate'=> '',
            'password' => 'confirmed|min:6',
           
        ]);
    
        $password = \Hash::make($data['password']);
    
        $restaurant = User::find($data['id_res']);
        $restaurant->password = $password;
    
    
        
        $restaurant->save();
        return redirect()->back()->with("success","SuperAdmin Password Updated with success !! ");
    
    
    }

//==============================================================================//


public function sendTodo(Request $request)
{
   $task = Task::find($request->id);

   TaskList::where('task_id',$request->id)->delete();
 
   for ($i=0; $i <count($request->todo)-1 ; $i++) { 
       if($i % 2 == 0){
           $todo = new TaskList;
           $todo->to_do = $request->todo[$i+1];
           if( $request->todo[$i] == "true" ){$todo->active =true;}
           $todo->task()->associate($task);
           $todo->save();
        }
   }
   return $request->todo ;
}

//=================================================================================//


           public function deleteTodo(Request $request)
           {
         

           TaskList::where('task_id',$request->id)->delete();
           Task::where('id',$request->id)->delete();
           
        
           return "cv chwiya" ;
           }

           
//=================================================================================//


           public function sendNewTodo(Request $request)
           {
         

               $task = new Task;
               $task->title = $request->title;
               $task->superAdmin()->associate(Auth::user()->superAdmin);
               $task->save();

             
               for ($i=0; $i <count($request->todo)-1 ; $i++) { 
                   if($i % 2 == 0){
                       $todo = new TaskList;
                       $todo->to_do = $request->todo[$i+1];
                       if( $request->todo[$i] == "true" ){$todo->active =true;}
                       $todo->task()->associate($task);
                       $todo->save();
                    }
               }
               return "innovartech make you happy" ;
           }

//=================================================================================//

}
