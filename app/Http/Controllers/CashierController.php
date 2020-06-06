<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Caisse;
use Validator;
use DB;
use App\OrderMeals;
use App\Customer;
use App\Restaurant;
use Carbon\Carbon;
use App\Employee;
use App\Screen;
use App\Promo;
class CashierController extends Controller
    {
    

        public function login(Request $request)
        {
            
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
    
            
    
            if (Auth::attempt($credentials)) {

                if (Auth::user()->employee()->exists()) {

               if (!Auth::user()->employee->active) {   
                    return response()->json(['error' => 'CompteBlocked'], 401);
               }
                    
                if (!Auth::user()->employee->privileges()->where('privilegeName',"caisses")->exists()) {
                
                return response()->json(['error' => 'doesntHavePrivileges'], 401);
                }
                
                $token = Auth::user()->createToken('MySecret')->accessToken;

 //check date update in restaurant and update nbr order and init day_prg value in all meals of restauran
               if ( Carbon::parse(Auth::user()->employee->restaurant->date_update_daily )->diffInDays(Carbon::now() ) > 0 ) {
                $res = Restaurant::find(Auth::user()->employee->restaurant->id);
                $res->date_update_daily = Carbon::now();
                $res->daily_nbr_order = 0;
                $res->save();
                //update meals day_prg
//==========================================================================================//

$meals = DB::table('meals')
->select('meals.id')
->leftJoin('categories',  'categories.id', '=','meals.category_id')
->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
->where('restaurants.id', Auth::user()->employee->restaurant->id )
->get();

foreach ($meals as $meal) {
    $pipi= "khra";
    $ml = Meal::find($meal->id);
    //get value of today's meals program
    $pipinilous = DB::table('week_programs')
    ->where('restaurant_id',Auth::user()->employee->restaurant->id)
    ->where('meal_id', $ml->id)
    ->get('week_programs.'.strtolower(Carbon::now()->isoFormat('dddd')));

    foreach ($pipinilous as $pipinilou) {
        $pipi = $pipinilou;
    } 
    if ($pipi != "khra" ) {  
      //update meal with value
    $tdfh="".strtolower(Carbon::now()->isoFormat('dddd'));
    $ml->day_prg =  $pipi->$tdfh ;
    $ml->save();
    }
}
//==========================================================================================//

             
               }



                return response()->json(['token' => $token , 'employee' => Auth::user()->employee ], 200);
                
                }else{
                    return response()->json(['error' => 'NotEmployee'], 401);
                }
                } else {
                return response()->json(['error' => 'UnAuthorised'], 401);
                }
        }


    /* public $successStatus = 200;

    public function login() { 
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) { 
            $oClient = OClient::where('password_client', 1)->first();
            return $this->getTokenAndRefreshToken($oClient, request('email'), request('password'));
        } 
        else { 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    */
    //==========================================================================================//
    
    public function addOrderForm(Request $request) 
    {
        $data =  Validator::make($request->all(),[
            'caisse_id' => 'required',
            'orderType' => 'required',
            'priceOrder' => '',
            'orderList' => 'required',
            'promo_id' => '',
            ]);

        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }
        $caisse = Caisse::find($request->caisse_id);
    
        if ($caisse == null) {
            return response()->json(['error' => 'NoCaisseWithThisId'], 401);
        }
        //add price to total caisse
        $caisse->total = $caisse->total + $request->priceOrder;
        $caisse->save();


        $nbr_ord = Auth::user()->employee->restaurant->daily_nbr_order ;



    
        $order = new Order;
        $order->caisse()->associate($caisse);
        if ($request->promo_id > 0 ) {
            $promoch = Promo::find($request->promo_id);
            $promoch->nbr_rst -= 1 ;
            $promoch->save();
            $order->promo()->associate($promoch);
        }
        $order->taux = 213;
        $order->nOrder = $nbr_ord + 1;
        $order->orderType = $request->orderType;
        $order->priceOrder = $request->priceOrder;
        $order->paymentStatus ="fdfdsfdsfsd";
        $order->paymentMethod ="fdfdsfdsfsd";
        $order->save();

    //   add meal list for order
    $status = true;
    foreach($request->orderList as $orMeal){
        $meal = Meal::find($orMeal['meal_id']);
        $order_meals = new OrderMeals;
        $order_meals->meal()->associate($meal);
        $order_meals->order()->associate($order);
        $order_meals->qnt = $orMeal['qnt'];
        $order_meals->status = $orMeal['status'];
        $order_meals->save();

        if ($orMeal['status'] == false) {
            $status = false;
        }
    }

    if ($status) {
        $order->orderStatus = "completed";
    }else {
        $order->orderStatus = "notYet";
    }
    
    $order->save();
    //update daily_nbr 
    $restaurant = Restaurant::find(Auth::user()->employee->restaurant->id);
    $restaurant->daily_nbr_order =  $restaurant->daily_nbr_order + 1;
    $restaurant->save();

        if ($order) {
            return response()->json('done'
            //     [
            //     'success' => true,
            //     'data' => $product->toArray()
            // ]
        );
        }
        else{
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'Product could not be added'
            // ]
            , 500);
        }




    }


    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }


    public function logout(){   
        if (Auth::check()) {
            $h_of_work =  Carbon::parse(Auth::user()->token()->created_at )->diffInHours(Carbon::now() );
            $employee = Employee::find(Auth::user()->employee->id);
            $employee->hWork += $h_of_work;
            $employee->save();
         
            Auth::user()->token()->delete();
            return response()->json(['success' =>'logout_success'],200); 
        }else{
            return response()->json(['error' =>'api.something_went_wrong'], 500);
        }
    }


    public function meals()
    {
        //$products = Meal::all();
    // $products = Auth::user()->employee->restaurant->meals()->where('public',true)->get();
        
  /*   $meals = DB::table('meals')
    ->select('meals.*','categories.categoryName','categories.categoryName_ar')
    ->leftJoin('categories',  'categories.id', '=','meals.category_id')
    ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
    ->where('restaurants.id', Auth::user()->employee->restaurant->id )
    ->where('meals.public', true )
    ->get();
 */
    $meals = DB::table('meals')
    ->select('meals.*','categories.categoryName','categories.categoryName_ar','week_programs.'.strtolower(Carbon::now()->isoFormat('dddd')) )
    ->leftJoin('categories',  'categories.id', '=','meals.category_id')
    ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
    ->where('restaurants.id', Auth::user()->restaurant->id )
    ->where('meals.public', true )
    ->when(true, function ($query)  {
        return $query->leftJoin('week_programs',  'week_programs.meal_id', '=','meals.id');
    })
    ->get();




       // return response()->json(  $meals );
        return response()->json(['meals' => $meals],200); 
    }


    public function caisseLogin(Request $request)
    {
        $data =  Validator::make($request->all(),[
            'idCaisse' => 'required',

            ]);

        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }


        $caisse = Caisse::where('idCaisse',$request->idCaisse)->first();
        if ($caisse ) {
        
            return response()->json(['caisse' => $caisse],200); 
        }else{
            return response()->json(['error' =>'wrong id Caisse'], 500);
        }

    }

    //====================================================================//
    public function getCustomer(Request $request)
    {
        $data =  Validator::make($request->all(),[
            'telCustomer' => 'required',

            ]);

        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }


        $customer = Customer::where('tel',$request->telCustomer)->first();
        if ($customer ) {

            if ($customer->restaurant_id != Auth::user()->employee->restaurant->id) {

                return response()->json(['error' =>'Customer Does not belong to our Restaurant'], 500);
            }else{
                return response()->json(['customer' => $customer],200); 
            }
        
        

        }else{
            return response()->json(['error' =>'No customer with this tel'], 500);
        }

    }


    //====================================================================//
    public function getAllCustomer()
    {
       
        $customers = Auth::user()->employee->restaurant->customers()->get();
       
        return response()->json( $customers ,200); 

      

    }

    //==========================================================================///

    public function newCustomer(Request $request)
    {

        $data =  Validator::make($request->all(),[
            'telCustomer' => 'required',
            'nameCustomer' => 'required',

            ]);

        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }


        $customer = Customer::where('tel',$request->telCustomer)->where('restaurant_id',Auth::user()->employee->restaurant->id)->first();
        if ($customer ) {

          
                return response()->json(['error' =>'Customer already registred in our Restaurant'], 500);
         
        
        

        }else{

            
            do
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $id_customer = '';
            for ($i = 0; $i < 5; $i++) {
                $id_customer .= $characters[rand(0, $charactersLength - 1)];
            }
            $customerCode = Customer::where('id_customer', $id_customer)->get();
        }
        while(!$customerCode->isEmpty());
    
        

            Auth::user()->employee->restaurant->customers()->create([	
    
                'customerName'=> $request->nameCustomer ,
                'tel'=> $request->telCustomer ,
                'id_customer'=> $id_customer ,
            
                ]);
        

                return response()->json(['success' =>  "j'aime"],200); 
           
        }



    }


    //==============================================================================//

    public function getOrderCompleted(Request $request)
    {

     
    $orders = DB::table('orders')
    ->select('orders.*')
    ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
    ->where('caisses.restaurant_id', Auth::user()->employee->restaurant->id )
    ->where('orders.orderStatus',"completed" )
    ->get();



        if ($orders) {
            return response()->json(['orders' => $orders],200); 
        }


        return response()->json(['error' =>'api.something_went_wrong'], 500);
        

    }


    
    //==============================================================================//

    public function getOrderNoCompleted(Request $request)
    {

     
    $orders = DB::table('orders')
    ->select('orders.*')
    ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
    ->where('caisses.restaurant_id', Auth::user()->employee->restaurant->id )
    ->where('orders.orderStatus', "!=" ,"completed" )
    ->get();



        if ($orders) {
            return response()->json(['orders' => $orders],200); 
        }


        return response()->json(['error' =>'api.something_went_wrong'], 500);
        

    }




       
    //==============================================================================//

    public function updateOrder(Request $request)
    {

        $data =  Validator::make($request->all(),[
            'idOrder' => 'required',

            ]);

        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }

        $order = Order::find($request->idOrder);
        $order->orderStatus = "completed";
        $order->save();


        return response()->json(['success' =>'success'], 200);
        

    }


    
 //==============================================================================//

 public function deleteOrder(Request $request)
 {

     $data =  Validator::make($request->all(),[
         'idOrder' => 'required',

         ]);

     if($data->fails()){
         return response()->json([
             "error" => 'validation_error',
             "message" => $data->errors(),
         ], 422);
     }

     OrderMeals::where('order_id',$request->idOrder)->delete();
     Order::where('id',$request->idOrder)->delete();
  

     return response()->json(['success' =>'success'], 200);
     

 }



 //===============================================================================
 

 

 public function checkPromoCode(Request $request)
 {

     $data =  Validator::make($request->all(),[
         'promo_code' => 'required',

         ]);

     if($data->fails()){
         return response()->json([
             "error" => 'validation_error',
             "message" => $data->errors(),
         ], 422);
     }

     $promo = Promo::where('codePromo',$request->promo_code)
                   ->where('admin_id',Auth::user()->employee->restaurant->admin_id )
                   ->where('date_debut', '<=', carbon::now() )
                   ->where('date_fin', '>=', carbon::now() )
                   ->where('nbr_rst', '>', 0)
                   ->first();

     if ($promo) {
       
        return response()->json(['promo' => $promo], 200);
     }else {

        return response()->json(['error' =>'code_error'], 500);
        

     }
  

     
     

 }

 //==============================================================================//


}
