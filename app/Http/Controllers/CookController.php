<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Order;
use DB;
use App\OrderMeals;
use App\Screen;
use Validator;

class CookController extends Controller
{
    

    public function loginForScreen(Request $request)
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
                
            if (!Auth::user()->employee->privileges()->where('privilegeName',"screens")->exists()) {
            
            return response()->json(['error' => 'doesntHavePrivileges'], 401);
            }
            
            $token = Auth::user()->createToken('MySecret')->accessToken;




            return response()->json(['token' => $token , 'employee' => Auth::user()->employee ], 200);
            
            }else{
                return response()->json(['error' => 'NotEmployee'], 401);
            }
            } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
            }
    }

//==================================================================================================


    public function screenLogin(Request $request)
    {
        $data =  Validator::make($request->all(),[
            'id_screen' => 'required',
   
            ]);
   
        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }
   
   
        $screen = Screen::where('id_screen',$request->id_screen)->first();
        if ($screen ) {
        
            return response()->json(['screen' => $screen],200); 
        }else{
            return response()->json(['error' =>'wrong id screen'], 500);
        }
   
    }
   
    //====================================================================//



 
    public function submitCompletedOrderMeal(Request $request)
    {
   
        $data =  Validator::make($request->all(),[
            'idOrder' => 'required',
            'idMeal' => 'required',
   
            ]);
   
        if($data->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $data->errors(),
            ], 422);
        }
   
        $order_meal =OrderMeals::where('order_id',$request->idOrder)->where('meal_id',$request->idMeal)->first();
        $order_meal->status = true;
        $order_meal->save();
   
        $check = OrderMeals::where('order_id',$request->idOrder)
                 ->where('status',false)
                 ->exists();
   
           if (!$check) {
              $order = Order::find($request->idOrder);
              $order->orderStatus = "completed";
              $order->save();
           }
        
        
     
   
        return response()->json(['success' =>'success'], 200);
        
   
    }
   
   //============================================================================
   

   public function getOrderForMyScreen(Request $request)
   {
  
       $data =  Validator::make($request->all(),[
           'idScreen' => 'required',
  
           ]);
  
       if($data->fails()){
           return response()->json([
               "error" => 'validation_error',
               "message" => $data->errors(),
           ], 422);
       }
      $meals = DB::table('meals')
       ->select('meals.id as meal_id','orders.id as order_id','meals.mealName','meals.mealName_ar','order_meals.qnt')
       ->leftJoin('order_meals',  'order_meals.meal_id', '=','meals.id')
       ->leftJoin('orders',  'orders.id', '=','order_meals.order_id')
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('restaurants',  'restaurants.id', '=','categories.restaurant_id')
       ->where('restaurants.id', Auth::user()->employee->restaurant->id )
       ->where('orders.orderStatus', '!=' , "completed" )
       ->where('order_meals.status', false )
       ->where('meals.screen_id', $request->idScreen )
       ->get();  

       
       
  
       
    
  
       return response()->json(['meals' =>$meals], 200);
       
  
   }
  

   //============================================================================
}
