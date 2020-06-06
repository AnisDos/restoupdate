<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Hash;
use App\Product;
use App\ProductVersion;
use App\provider;
use App\TransactionHistory;
use App\Charge;
use Illuminate\Support\Facades\DB;


use App\Task;
use App\TaskList;

class EmployeeController extends Controller
{
    

        
    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmedEmployee']);
    }


    
    public function index()
    {
        
        // dd(Auth::user()->email,Auth::user()->idEmployee);

        $privileges = Auth::user()->employee->privileges()->get();
        $tasks = Auth::user()->employee->tasks()->get();
       
        //dd($privileges);

        return view('employee.home',compact('privileges','tasks'));

    }


    //  tomatich =======> 1
    //  stock =======> 2
    //  stocks =======> 3


// check if employee has privilage
public function checkPrivilege(String $name)
{
  
    $exists = Auth::user()->employee->privileges->contains($name);

    return $exists;
    if (!$exists) {
       
        return redirect()->back();
    }

    return true;

}

//==================================================== stocks ============================================



public function stocksUpdateQnttToProduct()
{
    $this->checkPrivilege("stocks");

    $privileges = Auth::user()->employee->privileges()->get();
        $tasks = Auth::user()->employee->tasks()->get();
    
//this requet is not 100% correct check it again please
//get all version of product of
//  products.id as prod_id product_versions.id as vers_id product_versions.product_id product_versions.provider_id product_versions.price product_versions.return product_versions.date_experation_bool product_versions.date_experation product_versions.qntSTK product_versions.codebare product_versions.created_at product_versions.updated_at products.user_id products.productName products.unity products.limiteSTK
 
   $products = DB::select("select *  from products  LEFT JOIN product_versions ON product_versions.product_id = products.id
   where  products.restaurant_id =  " . Auth::user()->employee->restaurant_id ." " );

//this loop for testing
    /*     $stack=[];
    foreach ($products as $product){
        array_push($stack, $product);
    }
    dd($stack);
                   */          

   
    return view('employee.UpdateQnttToProduct', compact('products','privileges','tasks'));

}

public function addQntProduct()
{
    $this->checkPrivilege("stocks");

    $data = request()->validate([
        'id_product' => 'required',
        'qntToAdd' => 'required',
      
    ]);

    //add qnt to the product(update qntt)
    $productVersion = ProductVersion::find($data['id_product']);
    $oldqnt = $productVersion->qntSTK ;
    $productVersion->qntSTK = $productVersion->qntSTK + $data['qntToAdd'];
    $productVersion->save();

    //registre the transation of this employee
         
    $transactionHistory = new TransactionHistory;
    $transactionHistory->oldqnt = $oldqnt;
    $transactionHistory->qnt = $data['qntToAdd'];
    $transactionHistory->type = "addqnt";
    $transactionHistory->restaurant()->associate(Auth::user()->employee->restaurant);
    $transactionHistory->employee()->associate(Auth::user()->employee);
    $transactionHistory->productVersion()->associate($productVersion);
    $transactionHistory->save();


 
     
            
    return redirect()->back()->with("success","Quentity of Product updated with success !");

}


public function revokeQntProduct()
{
    
    
    $data = request()->validate([
        'id_product' => 'required',
        'qntToAdd' => 'required',
      
    ]);

    //revoke qnt from the product(update qntt)
    $productVersion = ProductVersion::find($data['id_product']);
    $oldqnt = $productVersion->qntSTK ;
    $productVersion->qntSTK = $productVersion->qntSTK - $data['qntToAdd'];
    $productVersion->save();

    //registre the transation of this employee
         
    $transactionHistory = new TransactionHistory;
    $transactionHistory->oldqnt = $oldqnt;
    $transactionHistory->qnt = $data['qntToAdd'];
    $transactionHistory->type = "revokeqnt";
    $transactionHistory->restaurant()->associate(Auth::user()->employee->restaurant);
    $transactionHistory->employee()->associate(Auth::user()->employee);
    $transactionHistory->productVersion()->associate($productVersion);
    $transactionHistory->save();


 
     
            
    return redirect()->back()->with("success","Quentity of Product updated with success !");

}



public function DeleteVersionProduct()
{
    
    
    $data = request()->validate([
        'id_product' => 'required',
        'textDelete' => 'required',
      
    ]);

    //delete version of product
    
    $pr = ProductVersion::find($data['id_product']);
    $pro = Product::find( $pr->product_id);
    $text = "employe has delete version of : " . $pro->productName  . " . his note for that is: "  . $data['textDelete'];

    $productVersion = ProductVersion::find($data['id_product'])->delete();

    //registre that employee delete version of product of this employee
         
    $transactionHistory = new TransactionHistory;
    $transactionHistory->type = "delete";
    $transactionHistory->noteIfDelete =$text ;
    $transactionHistory->restaurant()->associate(Auth::user()->employee->restaurant);
    $transactionHistory->employee()->associate(Auth::user()->employee);
    $transactionHistory->save();


 
     
            
    return redirect()->back()->with("success","Quentity of Product updated with success !");

}

public function stocksversionProduct()
{
    $this->checkPrivilege("stocks");
           
        $privileges = Auth::user()->employee->privileges()->get();
        $tasks = Auth::user()->employee->tasks()->get();
  /*   $products = DB::select("select *  from products  LEFT JOIN product_versions ON product_versions.product_id = products.id
    where  products.user_id =  " . Auth::user()->user_id ." " );
     */
  /*   $products = Product::where('user_id',Auth::user()->user_id)->get();
    
    $providers = Provider::where('user_id',Auth::user()->user_id)->get(); */

    $products = Auth::user()->employee->restaurant->products()->get();
    $providers = Auth::user()->employee->restaurant->providers()->get();
   
    return view('product.stocksversionProduct', compact('products','providers','privileges','tasks'));

}

public function addVersionProductForm() 
{
    $data = request()->validate([
        'id_product' => 'required',
        'qntSTK' => 'required',
        'price' => 'required',
        'return' => '',
        'date_experation_bool' => '',
        'date_experation' => '',
        'codebare' => 'required',
        'provider_id' => '',
      
    ]);

 

    if (empty($data['date_experation_bool'])){
        $date_experation_bool=false;
        
                }else {
                    $date_experation_bool=true;
                }


                if (empty($data['return'])){
                    $return=false;
                    
                            }else {
                                $return=true;
                            }         


              



    if ($date_experation_bool) {



        $me = Product::find($data['id_product']);

            $version = $me->productVersions()->create([
                
            'qntSTK'=>  $data['qntSTK'],
            'price'=>  $data['price'],
            'return'=>  $return,
            'date_experation_bool'=>  $date_experation_bool,
            'date_experation'=>  $data['date_experation'],
            'codebare'=>  $data['codebare'],
            ]);

            $provider = Provider::find($data['provider_id']);

            if ($provider) 
            { 
            $version->provider()->associate($provider);
            }

        
    }else{
        $me = Product::find($data['id_product']);


            $version = $me->productVersions()->create([
                
            'qntSTK'=>  $data['qntSTK'],
            'price'=>  $data['price'],
            'return'=>  $return,
            'date_experation_bool'=>  $date_experation_bool,
            'codebare'=>  $data['codebare'],
            ]);

            $provider = Provider::find($data['provider_id']);

            if ($provider) 
            { 
            $version->provider()->associate($provider);
            }


    }



    

      
    //registre the transation of this employee adding version 
         
    $transactionHistory = new TransactionHistory;
    $transactionHistory->qnt = $data['qntSTK'];
    $transactionHistory->type = "addnew";
    $transactionHistory->restaurant()->associate(Auth::user()->employee->restaurant);
    $transactionHistory->employee()->associate(Auth::user()->employee);
    $transactionHistory->productVersion()->associate($version);
    $transactionHistory->save();

 //add charge  mazalha f test

 $charge = new Charge;
 $charge->priceCharge = $data['price'] * $data['qntSTK'];
 $charge->type = "stock";
 $charge->note = "employee added new version of product";
 $charge->employee()->associate(Auth::user()->employee);
 $charge->restaurant()->associate(Auth::user()->employee->restaurant);
 $charge->save();


        
     return redirect()->back()->with("success"," Product added with success !! you can check it :)");

}
//==================================================== end stocks ============================================





public function addNewProduct()
{
    $this->checkPrivilege("stocks");

    $privileges = Auth::user()->employee->privileges()->get();
        $tasks = Auth::user()->employee->tasks()->get();
    $providers = Auth::user()->employee->restaurant->providers()->get();
   
    return view('employee.addNewProduct', compact('privileges','tasks','providers'));

}



public function allProducts()
{
    $this->checkPrivilege("stocks");

    $privileges = Auth::user()->employee->privileges()->get();
        $tasks = Auth::user()->employee->tasks()->get();
    $products = DB::table('products')
    ->select('products.*', DB::raw("SUM(product_versions.qntSTK) as qntSTKto"))
    ->leftJoin('product_versions',  'product_versions.product_id', '=','products.id')
    ->leftJoin('restaurants',  'restaurants.id', '=','products.restaurant_id')
    ->where('restaurants.id', Auth::user()->employee->restaurant->id )
    ->groupBy('products.id')
    ->get();
    
    
    return view('employee.allProducts', compact('privileges','tasks','products'));

}


//=========================================================================================//



public function addProductFormEmployee() 
{
    $data = request()->validate([
        'productName' => 'required',
        'productName_ar' => '',
        'qntSTK' => 'required',
        'unity' => 'required',
        'price' => 'required',
        'tax' => 'required',
        'return' => '',
        'date_experation_bool' => '',
        'date_experation' => '',
        'limiteSTK' => 'required',
        'codebare' => 'required',
        'provider_id' => '',
      
    ]);
 

    if (empty($data['date_experation_bool'])){
        $date_experation_bool=false;
        
                }else {
                    $date_experation_bool=true;
                }


                if (empty($data['return'])){
                    $return=false;
                    
                            }else {
                                $return=true;
                            }         


                     //       dd('hgjhgjh',$date_experation_bool,$return);




    if ($date_experation_bool) {



        $me = Product::create([
    
            'productName'=> $data['productName'],
            'productName_ar'=> $data['productName_ar'],
            'unity'=>  $data['unity'],
            'tax'=>  $data['tax'],
            'limiteSTK'=>  $data['limiteSTK'],
        
            ]);

            $version = $me->productVersions()->create([
                
            'qntSTK'=>  $data['qntSTK'],
            'price'=>  $data['price'],
            'return'=>  $return,
            'date_experation_bool'=>  $date_experation_bool,
            'date_experation'=>  $data['date_experation'],
            'codebare'=>  $data['codebare'],
            ]);

            $provider = Provider::find($data['provider_id']);

            if ($provider) 
            { 
            $version->provider()->associate($provider);
            }

        
    }else{
        $me = Product::create([
    
            'productName'=> $data['productName'],
            'productName_ar'=> $data['productName_ar'],
            'unity'=>  $data['unity'],
            'limiteSTK'=>  $data['limiteSTK'],
            'tax'=>  $data['tax'],
        
            ]);

            $version = $me->productVersions()->create([
                
            'qntSTK'=>  $data['qntSTK'],
            'price'=>  $data['price'],
            'return'=>  $return,
            'date_experation_bool'=>  $date_experation_bool,
            'codebare'=>  $data['codebare'],
            ]);

            $provider = Provider::find($data['provider_id']);

            if ($provider) 
            { 
            $version->provider()->associate($provider);
            }


    }



      $me->restaurant()->associate(Auth::user()->employee->restaurant);
      $me->save();


       //registre the transation of this employee adding version 
     
$transactionHistory = new TransactionHistory;
$transactionHistory->qnt = $data['qntSTK'];
$transactionHistory->type = "addnew";
$transactionHistory->employee()->associate(Auth::user()->employee);
$transactionHistory->productVersion()->associate($version);
$transactionHistory->save();



//add charge   mazalha f test

$charge = new Charge;
$charge->priceCharge = $data['price'] * $data['qntSTK'];
$charge->type = "stock";
$charge->note = "employee added new version of product";
$charge->employee()->associate(Auth::user()->employee);
//$charge->restaurant()->associate(Auth::user()->restaurant);
$charge->save();

 

        
     return redirect()->back()->with("success"," Product added with success !");

}

//=========================================================================================//
//=========================================================================================//
//=========================================================================

public function updateProduct()
{

    $this->checkPrivilege("stocks");
    $data = request()->validate([
        'id_product' => 'required',
        'productName' => 'required',
        'productName_ar' => 'required',
        'unity' => 'required',
        'tax' => 'required',
        'limiteSTK' => 'required',
    ]);
 

    $prod = Product::find($data['id_product']);
    $prod->productName = $data['productName'] ; 
    $prod->productName_ar = $data['productName_ar'] ; 
    $prod->unity = $data['unity'] ; 
    $prod->tax = $data['tax'] ;  
    $prod->limiteSTK = $data['limiteSTK'] ; 
    $prod->save();


    return redirect()->back()->with("success"," Product Updated with success !");

}
//=========================================================================


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
               $task->employee()->associate(Auth::user()->employee);
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
