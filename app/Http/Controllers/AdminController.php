<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Hash;
//use Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Meal;
use App\Product;
use App\Admin;
use App\Ingredient;
use Illuminate\Support\Arr;
use App\OrderMeals;
use App\Restaurant;
use DB;
use Carbon\Carbon;
use App\Promo;
use App\Task;
use App\TaskList;

use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed']);
    }


   // check if admin has privilage
   public function checkPrivilege(String $name)
   {
     
       $exists = Auth::user()->admin->privileges->contains($name);
   
       return $exists;
       if (!$exists) {
          
           return redirect()->back();
       }
   
       return true;
   
   }
   



    public function index()
    {



        $privileges = Auth::user()->admin->privileges()->get();
        $tasks = Auth::user()->admin->tasks()->get();
//partie chart===================================================================
$charts = array();
$restaurants = Auth::user()->admin->restaurants()->get();
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
   ->where('orders.orderStatus',"completed")
   ->sum('orders.priceOrder');
   array_push($mounth,  $order);
}
   array_push($charts,  array( $restaurant->name,$mounth));
}
//end partie charts===================================================================
//partie chart===================================================================
$chartsexpenses = array();

// feach all restaurant of this admin and try yo evry one put there name end revuen of year
foreach($restaurants as $restaurant){
   $year = 2020;
   $tz = 'Europe/Madrid';
$mounth = array();
   for ($i=1; $i <13 ; $i++) { 
   $order = DB::table('charges')
   ->where('charges.restaurant_id', $restaurant->id )
   ->where('charges.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('charges.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('charges.priceCharge');
   array_push($mounth,  $order);
}
   array_push($chartsexpenses,  array( $restaurant->name,$mounth));
}
//end partie charts===================================================================
//dd($charts[0][1],$order);
//partie chart total orders===================================================================
$chartOrders = array();

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
   ->where('orders.orderStatus',"completed")
   ->count('*');
   array_push($mounth,  $order);
}
   array_push($chartOrders,  array( $restaurant->name,$mounth));
}
//end partie charts total orders===================================================================

//partie header kariyat sghar li fihom nimirouwat =====================================

$year = carbon::now()->year;
$month = carbon::now()->month;
$tz = 'Europe/Madrid';

$totalRestaurants =  Auth::user()->admin->restaurants()->count() ;


$totalCustomers =DB::table('customers')
->leftJoin('restaurants',  'restaurants.id', '=','customers.restaurant_id')
->where('restaurants.admin_id',Auth::user()->admin->id)
->count('*');


$totalEmployee =DB::table('employees')
->leftJoin('restaurants',  'restaurants.id', '=','employees.restaurant_id')
->where('restaurants.admin_id',Auth::user()->admin->id)
->count('*');

$totalOrders =DB::table('orders')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
->where('restaurants.admin_id',Auth::user()->admin->id)
->where('orders.created_at', '>=', Carbon::createFromDate($year, $month,0, $tz) )
->where('orders.created_at', '<',Carbon::createFromDate($year, $month+1,0, $tz) )
->where('orders.orderstatus', "completed")
->count('*');


//dd($totalRestaurants ,$totalCustomers,$totalEmployee,$totalOrders);

//=====================================================================================


        return view('admin.home',compact('chartOrders','chartsexpenses','charts','privileges','tasks','totalRestaurants','totalCustomers','totalEmployee','totalOrders') );

    }
 //=======================================================================================================
 //=======================================================================================================
 //=======================================================================================================
 //=======================================================================================================   
    public function addRestaurant()
    {

        $privileges = Auth::user()->admin->privileges()->get();
        
        $tasks = Auth::user()->admin->tasks()->get();
      /*   $meals = Meal::find(1);
        
        $oldingredients = $meals->ingredients()->get();
        dd($oldingredients);

        $meals = DB::table('meals')
        ->select('meals.*','categories.categoryName')
        ->leftJoin('categories',  'categories.id', '=','meals.category_id')
        ->leftJoin('users',  'users.id', '=','categories.user_id')
        ->where('users.id', 2)
        ->get();
      
      foreach($meals as $meal){
      
              $oldingredients = $meal->ingredients()->get();
              dd($oldingredients);
      }    */   
     
        return view('admin.addRestaurant', compact('privileges','tasks') );

    }
    

    public function addRestaurantFormValidation()
{
   
    $data = request()->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'unique:users',
        'password' => 'required|confirmed|min:6',
        'address'=>'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

 
    if (request('image') != null){
     
        $imagePath = request('image')->store('users','public');
       $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
       
        $image->save();

    }

$password = \Hash::make($data['password']);


$compte = new User;
$compte->email = $data['email'];
$compte->password = $password;
$compte->save();
    //registre that employee delete version of product of this employee
    $restaurant = new Restaurant;
    $restaurant->name = $data['name'];
    $restaurant->address = $data['address'];
  /*   $restaurant->email = $data['email'];
    $restaurant->password = $password; */
    if (request('image') != null){$restaurant->image = $imagePath;}
   
    
    $restaurant->admin()->associate(Auth::user()->admin);
    $restaurant->user()->associate($compte);
    $restaurant->save();

    //assign menus to new restaurant===========================================================================

    $categories = Auth::user()->admin->categories()->get();
   
  //  $categories = Category::where('user_id', Auth::user()->id)->get();
    $arrayReferencescatOldNew = array();
    foreach($categories as $category){

       $cat = $restaurant->categories()->create([
    
            'categoryName'=> $category->categoryName ,
            'categoryName_ar'=> $category->categoryName_ar ,
           
            ]);

            // add in array key of category admin references to category restaurant
            
            $arrayReferencescatOldNew[$category->id] = $cat->id;
            
    

    }

    //dd($array);
//=======================================================================================================
// add product 

//nb: s3iba
//add only product not version productcuz evry restaurant have his own stock
//$products = Product::where('user_id',Auth::user()->id)->get();
$products = Auth::user()->admin->products()->get();
$arrayReferencesProductOldNew = array();
foreach($products as $product){

    
    $me = Product::create([
        
        'productName'=> $product->productName ,
        'unity'=>  $product->unity ,
        'limiteSTK'=> $product->limiteSTK ,
    
        ]);

        $me->restaurant()->associate($restaurant);
        $me->save();

        $arrayReferencesProductOldNew[$product->id] = $me->id;
            
    
   
          }


//=======================================================================================================

// add meals

//$meals = Meal::where('user_id',Auth::user()->id)->get();
//$meals == Auth::user()->categories()->meals();
  // $meals = Auth::user()->categories()->meals()->get();
         
  $meals =  DB::table('meals')
  ->select('meals.*')
  ->leftJoin('categories',  'categories.id', '=','meals.category_id')
  ->leftJoin('admins',  'admins.id', '=','categories.admin_id')
  ->where('admins.user_id', Auth::user()->id )
  ->get();

foreach($meals as $mealee){

    $meal = Meal::find($mealee->id);

    $category = Category::where('id',$arrayReferencescatOldNew[$meal->category_id])->first();
    $newmeal =    $category->meals()->create([
        
        'mealName'=> $meal->mealName ,
        'price'=>  $meal->price ,
        'description'=>  $meal->description ,
        'image'=>   $meal->image ,
        
    
        ]);

     /*    
        $newmeal->user()->associate($restaurant);
        $newmeal->save();

 */


        $oldingredients = $meal->ingredients()->get();


        foreach($oldingredients as $oldingredient){ 


        
            $product = Product::find($arrayReferencesProductOldNew[$oldingredient->product_id]);
           
           
            $ingredient = new Ingredient;
            $ingredient->qnt = $oldingredient->qnt;
            $ingredient->meal()->associate($newmeal);
            $ingredient->product()->associate($product);
            $ingredient->save();
    
    



        }



}

 
     
            
    return redirect()->back()->with("success","restaurant added with success !! Make some delicious food :)");

}


public function restaurantsList()
{

    $privileges = Auth::user()->admin->privileges()->get();

    $tasks = Auth::user()->admin->tasks()->get();
   // $restaurants= User::where('user_id',Auth::user()->id)->get();
    $restaurants= Auth::user()->admin->restaurants()->get();
    

    return view('admin.restaurantsList', compact('restaurants','privileges','tasks') );

}



public function restaurantDetails(Restaurant $restaurant)
{
 
    if ( !Restaurant::where('admin_id',auth::user()->admin->id)->where('id',$restaurant->id)->exists() ) {
        return redirect()->back()->with("danger"," please don't play with that ! Do your job seriously");
    }
 
$someInfoEmployees = $restaurant->employees()->get();


//partie chart===================================================================


$year = 2020;
$tz = 'Europe/Madrid';


$revenus = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('orders')
/*    ->select('orders.*') */
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.restaurant_id', $restaurant->id )
   ->where('orders.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('orders.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('orders.priceOrder');



   array_push($revenus,  $order);



}

$depenses = array();
   for ($i=1; $i <13 ; $i++) { 
   

   $order = DB::table('charges')
/*    ->select('charges.*') */
   ->where('charges.restaurant_id', $restaurant->id )
   ->where('charges.created_at', '>=', Carbon::createFromDate($year, $i,0, $tz) )
   ->where('charges.created_at', '<',Carbon::createFromDate($year, $i+1,0, $tz) )
   ->sum('charges.priceCharge');



   array_push($depenses,  $order);



}


//end partie chart===================================================================



$totalrevenus= DB::table('orders')
   ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
   ->where('caisses.restaurant_id', $restaurant->id )
   ->where('orders.created_at', '>=',  Carbon::createFromDate($year, 1,0, $tz)  )
   ->where('orders.created_at', '<',Carbon::createFromDate($year+1, 1,0, $tz) )
   ->sum('orders.priceOrder');

$totaldepenses= DB::table('charges')
/*    ->select('charges.*') */
   ->where('charges.restaurant_id', $restaurant->id )
   ->where('charges.created_at', '>=', Carbon::createFromDate($year, 1,0, $tz) )
   ->where('charges.created_at', '<',Carbon::createFromDate($year+1, 1,0, $tz) )
   ->sum('charges.priceCharge');


   $totalorders =  DB::table('orders')
      ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
      ->where('caisses.restaurant_id', $restaurant->id )
      ->count('*');
   
   
   

//dd($totalrevenus,$totaldepenses);
$privileges = Auth::user()->admin->privileges()->get();

$charges = $restaurant->charges()->get();
$orders = DB::table('orders')
->select('orders.*')
->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
->where('caisses.restaurant_id',$restaurant->id  )
->where('orders.orderStatus',"completed" )
->get();

$historyTransactions =$restaurant->transactionHistories()->get();


$tasks = Auth::user()->admin->tasks()->get();
    return view('admin.restaurantDetails', compact('tasks','historyTransactions','orders','charges','restaurant','someInfoEmployees','revenus','depenses','totalrevenus','totaldepenses','totalorders','privileges') );
  

}





public function updateRestaurantInfo(){
    $restaurant = Restaurant::find(request()['id_res']);
   
    $data = request()->validate([
        'id_res'=> '',
        'name' => 'required|min:3|max:50',
        //'email' => 'unique:users'.request()['email'],
       // 'email'=>'',
       'email' => ['required','email', \Illuminate\Validation\Rule::unique('users')->ignore($restaurant->user->id)],
       // 'password' => 'confirmed|min:6',
        'address'=>'required',
        'image' => '',
    ]);

  
    
    
 
    if (request('image') != null){
      
        $imagePath = request('image')->store('users','public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
       
        $image->save();
       
    }
  

$compte = User::find($restaurant->user->id);
$compte->email = $data['email'];
$compte->save();

    //$restaurant = User::find($data['id_res']);
    //dd($restaurant,$data['id_res']);
    $restaurant->name = $data['name'];
    $restaurant->address = $data['address'];
 
    if (request('image') != null){$restaurant->image = $imagePath;}
    
    $restaurant->save();

    return redirect()->back()->with("success","restaurant information Updated with success !! ");


}







public function updatePasswordRestaurant()
{

    
    $data = request()->validate([
        'id_res'=> '',
        'Activate'=> '',
        'password' => 'confirmed|min:6',
       
    ]);

    $password = \Hash::make($data['password']);




    $restaurant = Restaurant::find($data['id_res']);



    
$compte = User::find($restaurant->user->id);
$compte->password = $password;
$compte->save();



    if (request('Activate') == "activih"){$restaurant->active = true;}
    
    $restaurant->save();
    return redirect()->back()->with("success","restaurant Password Updated with success !! ");


}

public function decativateRestaurant()
{

        
    $data = request()->validate([
        'id_res'=> '',

       
    ]);

    $password = "djit nkasi la routine";

    $restaurant = Restaurant::find($data['id_res']);


    
    
    //$compte = User::find($restaurant->user->id);
    //$compte->password = $password;
    //$compte->save();



   $restaurant->active = false;
    
    $restaurant->save();
    return redirect()->back()->with("danger","restaurant Blocked with success !! ");



}

//==========================================================================================================


public function addMeal()
{
    $this->checkPrivilege("stocks");
    $privileges = Auth::user()->admin->privileges()->get();
    
    
    
    //$categories = Category::where('user_id',Auth::user()->id)->get();
    //$products = Product::all();

    $categories = Auth::user()->admin->categories()->get();
    $products = Auth::user()->admin->products()->get();
    
    $tasks = Auth::user()->admin->tasks()->get();

    return view('admin.addMeal', compact('categories','products','privileges','tasks')  );

}







public function addMealForm() 
{
    $data = request()->validate([
        'mealName' => 'required',
        'mealName_ar' => '',
        'category' => 'required',
        'price' => ['required', 'max:10'],
        'description' => 'required',
        'tax' => 'required',
        'image' => '',
        'var'=>  '',
    ]);

 
 
    
    if (request('image')){

        $imagePath = request('image')->store('meals','public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
       
        $image->save();
       
    }

    $category = Category::find($data['category']);


    if (request('image')){
        $me =    $category->meals()->create([
           
                'mealName'=> $data['mealName'] ,
                'mealName_ar'=> $data['mealName_ar'] ,
                'price'=>  $data['price'],
                'tax'=>  $data['tax'],
                'description'=>  $data['description'],
                'image'=>  $imagePath,
                
            
                ]);
   
        
    }else {
        $me =    $category->meals()->create([
           
                'mealName'=> $data['mealName'] ,
                'mealName_ar'=> $data['mealName_ar'] ,
                'price'=>  $data['price'],
                'tax'=>  $data['tax'],
                'description'=>  $data['description'],
               
                
            
                ]);
   
        
    }

         
    
         
     //put string geted from form too a array 
         $dataIngridient= preg_split("/[,]/",$data['var'][0]);
     


if (count($dataIngridient) > 1 ) {


for($i = 0;  $i< count($dataIngridient) ;  $i++)
{

   if($i % 2 == 0){ 

       $product = Product::find($dataIngridient[$i]);
       
       
       $ingredient = new Ingredient;
       $ingredient->qnt = $dataIngridient[$i+1];
       $ingredient->meal()->associate($me);
       $ingredient->product()->associate($product);
       $ingredient->save();


   }
                       
       
   

}


}

      


 
        
     return redirect()->back()->with("success"," Meal added with success !");

}






public function addCategory()
{
    $this->checkPrivilege("stocks");
    $privileges = Auth::user()->admin->privileges()->get();
    
    $allcategories = Auth::user()->admin->categories()->get();

    
    $tasks = Auth::user()->admin->tasks()->get();


    return view('admin.addCategory',compact('privileges','allcategories','tasks') );

}







public function addCategoryForm() 
{
    $data = request()->validate([
        'categoryName' => 'required',
        'categoryName_ar' => '',
   
    ]);



$me =    Auth::user()->admin->categories()->create([
    
    'categoryName'=> $data['categoryName'] ,
    'categoryName_ar'=> $data['categoryName_ar'] ,
    
     
         ]);
 

        
     return redirect()->back()->with("success"," Category added with success !");

}


//=============================================================================//

public function updateNameCategory() 
{
    $data = request()->validate([
        'id_category' => 'required',
        'categoryNameUp' => 'required',
        'categoryName_arUp' => '',
   
    ]);

    $cat = Category::find($data['id_category']);
    $cat->categoryName = $data['categoryNameUp'];
    $cat->categoryName_ar = $data['categoryName_arUp'];
    $cat->save();




        
     return redirect()->back()->with("success"," Category Updated with success !");

}

//==============================================================================//





public function mealsList()
{
    
    $this->checkPrivilege("stocks");
    $privileges = Auth::user()->admin->privileges()->get();
    
    //$meals = Meal::all();
   // $meals = Auth::user()->admin->categories()->meals()->get();
   /*  $meals = DB::table('meals')
       ->select('meals.*')
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('admins',  'admins.id', '=','categories.admin_id')
       ->where('admins.user_id', Auth::user()->id )
       ->get(); */


       
       $meals =  DB::table('meals')
       //->select('meals.*', DB::raw('ingredients.qnt * product_versions.price AS priceOneIng') )
       ->select('meals.*', DB::raw("SUM(ingredients.qnt * product_versions.price) as priceMealIng") )
       ->leftJoin('categories',  'categories.id', '=','meals.category_id')
       ->leftJoin('admins',  'admins.id', '=','categories.admin_id')
       ->leftJoin('ingredients',  'ingredients.meal_id', '=','meals.id')
       ->leftJoin('products',  'products.id', '=','ingredients.product_id')
       ->leftJoin('product_versions',  'products.id', '=','product_versions.product_id')
       ->groupby('meals.id')
       ->where('admins.user_id', Auth::user()->id )
       ->get();




       $tasks = Auth::user()->admin->tasks()->get();



    //dd($meals);
    return view('admin.mealsList', compact('meals','privileges','tasks')  );

}





public function mealDetails(Meal $meal)
{
    if($meal->category->admin_id != Auth::user()->admin->id)
        {
            return redirect()->back()->with("danger","You can't do this action !! ");

        }
        

    $this->checkPrivilege("stocks");
    $privileges = Auth::user()->admin->privileges()->get();
    $totalOrders = OrderMeals::where('meal_id',$meal->id)->count('*');

    $tasks = Auth::user()->admin->tasks()->get();

    return view('admin.mealDetails', compact('tasks','meal','privileges','totalOrders')  );

}

public function updateMeal(Meal $meal)
{

    $this->checkPrivilege("stocks");
    $privileges = Auth::user()->admin->privileges()->get();
    
    
    $ingredients = Ingredient::where('meal_id', $meal->id)->get();
    $categories = Auth::user()->admin->categories()->get();
    //$categories = Category::where('user_id',Auth::user()->id)->get();
   // $products = Product::all();
    $products = Auth::user()->admin->products()->get();

    $tasks = Auth::user()->admin->tasks()->get();
    return view('admin.updateMeal', compact('tasks','meal','categories','products','ingredients','privileges')  );

}




public function updateMealForm(Request $request) 
{
    $data = request()->validate([
        'mealName' => 'required',
        'mealName_ar' => '',
        'category' => 'required',
        'price' => ['required', 'max:10'],
        'description' => 'required',
        'image' => '',
        'var'=>  '',
        'id_meal'=>'',
    ]);

   
    


    
    if (request('image')){

        $imagePath = request('image')->store('meals','public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(120,120);
       
        $image->save();
       
    }

    $category = Category::find($data['category']);



    $me = Meal::where('id',  $data['id_meal'])->first();


         $me->mealName=  $data['mealName'] ;
         $me->mealName_ar=  $data['mealName_ar'] ;
         $me->price=  $data['price'] ;
         $me->description=  $data['description'] ;
         if (request('image')){ $me->image=  $imagePath ; }
         $me->category()->associate($category);
         
         $me->save();

    
         
     //put string geted from form too a array 
         $dataIngridient= preg_split("/[,]/",$data['var'][0]);


 //delete ingredient and recreate theme

$t=  Ingredient::where('meal_id', $me->id)->delete();



     //create ingridients of meal

     
     if (count($dataIngridient) > 1 ) {


        for($i = 0;  $i< count($dataIngridient) ;  $i++)
        {
    
           if($i % 2 == 0){ 
    
               $product = Product::find($dataIngridient[$i]);
               
               
               $ingredient = new Ingredient;
               $ingredient->qnt = $dataIngridient[$i+1];
               $ingredient->meal()->associate($me);
               $ingredient->product()->associate($product);
               $ingredient->save();
    
    
           }
                               
               
           
    
        }
    
    
    }


 
        
     return redirect()->back()->with("success"," Meal updated with success !");

}

public function deactivateMeal(){


    $data = request()->validate([
        'meal_id' => 'required',
     
    ]);


    $meal = Meal::find($data['meal_id']);
    $meal->public = false;
    $meal->save();

     return redirect()->back()->with("success"," Meal Deactivated with success !");



}



public function activateMeal(){


    $data = request()->validate([
        'meal_id' => 'required',
     
    ]);


    $meal = Meal::find($data['meal_id']);
    $meal->public = true;
    $meal->save();

     return redirect()->back()->with("success"," Meal Activated with success !");



}


//==============================================================================================
//==============================================================================================
//==============================================================================================
//==============================================================================================
//==============================================================================================
//==============================================================================================









public function allCustomers()
{
    

$this->checkPrivilege("customers");
$privileges = Auth::user()->admin->privileges()->get();


$tz = 'Europe/Madrid';
$year = carbon::now()->year;
$month = carbon::now()->month;


    $customers = DB::table('orders')
    ->select('customers.*','restaurants.name as resname', DB::raw("SUM(orders.priceOrder) as priceIng") )
    ->leftJoin('customers',  'customers.id', '=','orders.customer_id')
    ->leftJoin('restaurants',  'restaurants.id', '=','customers.restaurant_id')
    ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
    ->where('admins.id',Auth::user()->admin->id)
    ->where('orders.created_at', '>=', Carbon::createFromDate($year, $month,0, $tz) )
    ->where('orders.created_at', '<',Carbon::createFromDate($year, $month+1,0, $tz) )
    ->groupBy('orders.customer_id')
    ->get();


    $allcustomers = DB::table('customers')
    ->select('customers.*','restaurants.name as resname')
    ->leftJoin('restaurants',  'restaurants.id', '=','customers.restaurant_id')
    ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
    ->where('admins.id',Auth::user()->admin->id)
    ->groupBy('customers.id')
    ->get();



    $tasks = Auth::user()->admin->tasks()->get();

return view('admin.allCustomers',compact('allcustomers','customers','privileges','tasks'));


}



public function accountsettings(Admin $admin) 
{

    if(auth::user()->admin->id != $admin->id){

        return redirect()->back()->with("danger"," You try to do a danger things be careful I will punish you ! ");

    }
    $privileges = Auth::user()->admin->privileges()->get();


    $tasks = Auth::user()->admin->tasks()->get();

    return view('admin.accountsettings',compact('admin','privileges','tasks') );



}









public function updateadminInfo(Request $request){
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
  



    $admin = Admin::find(Auth::user()->admin->id);
    $compte = User::find(Auth::user()->id);
    $admin->name = $data['name'];

    $compte->email = $data['email'];
    if (request('image') != null){$admin->image = $imagePath;}
    
    $admin->save();
    $compte->save();

    return redirect()->back()->with("success","Admin information Updated with success !! ");


}


public function updatePasswordadmin()
{

    
    $data = request()->validate([
        'id_res'=> '',
        'Activate'=> '',
        'password' => 'confirmed|min:6',
       
    ]);

    $password = \Hash::make($data['password']);

    $compte = User::find($data['id_res']);
    $compte->password = $password;


    
    $compte->save();
    return redirect()->back()->with("success","Admin Password Updated with success !! ");


}




//========================================================================
//========================================================================


public function others()
{

    $caisses =  DB::table('caisses')
    ->select('caisses.*','restaurants.name as resname')
    ->leftJoin('restaurants',  'restaurants.id', '=','caisses.restaurant_id')
    ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
    ->where('admins.id',Auth::user()->admin->id)
    ->get();

    $screens =  DB::table('screens')
    ->select('screens.*','restaurants.name as resname')
    ->leftJoin('restaurants',  'restaurants.id', '=','screens.restaurant_id')
    ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
    ->where('admins.id',Auth::user()->admin->id)
    ->get();


   // dd($caisses,$screens);
   $privileges = Auth::user()->admin->privileges()->get();


   $tasks = Auth::user()->admin->tasks()->get();

    return view('admin.others', compact('caisses','screens','privileges','tasks')  );

}

//==============================================================================//


public function promoCode()
{

    
   $promos = Auth::user()->admin->promos()->get();
    
   // dd($caisses,$screens);
   $privileges = Auth::user()->admin->privileges()->get();


   $tasks = Auth::user()->admin->tasks()->get();

    return view('admin.promoCode', compact('privileges','tasks','promos')  );

}

//==============================================================================//



        public function addCodePromo(){
            $data = request()->validate([
                'codePromo' => 'unique:promos',
                'taux' => 'required',
                'date_debut' => 'required',
                'date_fin' => 'required',
                'nbr_rst' => 'required',
            
            ]);
            $string = str_replace(' ', '',  $data['codePromo'] );

            if ( Promo::where('codePromo', $string )->exists() ) {
                return redirect()->back()->with("danger"," The code promo has already been taken !");
            }
            $cat = Auth::user()->admin->promos()->create([
    
                'codePromo'=> $string ,
                'taux'=> $data['taux'] ,
                'date_debut'=> $data['date_debut'] ,
                'date_fin'=> $data['date_fin'] ,
                'nbr_rst'=> $data['nbr_rst'] ,
               
                ]);
            return redirect()->back()->with("success"," Promo code added with success !");

        }


//========================================================================


public function deletePromo(){
    $data = request()->validate([
        'id_promo' => 'required',
    
    ]);
    

    Promo::find($data['id_promo'])->delete();

  
 
    return redirect()->back()->with("danger"," Promo code deleted with success !");

}


//========================================================================
//========================================================================


        public function checkPromo(Promo $promo) 
        {

            if(auth::user()->admin->id != $promo->admin_id){

                return redirect()->back()->with("danger"," You try to do a danger things be careful Please ! ");

            }

            $privileges = Auth::user()->admin->privileges()->get();
            $tasks = Auth::user()->admin->tasks()->get();


// all resto who used this code promo---------------------------------------
            $resto_promos = Array() ;
            $restaurants = Auth::user()->admin->restaurants()->get();
            foreach ($restaurants as $restaurant) {
        $count_promo =  DB::table('orders')
        ->select('orders.*')
        ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
        ->where('caisses.restaurant_id',$restaurant->id  )
        ->where('orders.promo_id',$promo->id  )
        ->where('orders.orderStatus',"completed" )
        ->count();  
            array_push($resto_promos,  array( $restaurant->name,$count_promo)); 
            }
//-----------------------------------------------------------------------------
// all customers who used this code promo--------------------------------------
        $customer_promos = Array() ;
        $customers = DB::table('customers')
        ->select('customers.*','restaurants.name as resname')
        ->leftJoin('restaurants',  'restaurants.id', '=','customers.restaurant_id')
        ->leftJoin('admins',  'admins.id', '=','restaurants.admin_id')
        ->where('admins.id',Auth::user()->admin->id)
        ->groupBy('customers.id')
        ->get();
    
    
        foreach ($customers as $customer) {
        $count_promo =  DB::table('orders')
        ->select('orders.*')
        ->leftJoin('caisses',  'caisses.id', '=','orders.caisse_id')
        ->where('orders.customer_id',$customer->id  )
        ->where('orders.promo_id',$promo->id  )
        ->where('orders.orderStatus',"completed" )
        ->count();  
        array_push($customer_promos,  array( $customer->customerName, $customer->resname, $count_promo)); 
        }
//-----------------------------------------------------------------------------

    
    
           // dd($resto_promos,$customer_promos);


            return view('admin.checkPromo',compact('promo','privileges','tasks','resto_promos','customer_promos') );



        }

//========================================================================

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
               $task->admin()->associate(Auth::user()->admin);
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
