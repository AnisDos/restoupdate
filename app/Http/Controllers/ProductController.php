<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductVersion;
use Illuminate\Support\Facades\Auth;
use App\Provider;
use DB;
use App\TransactionHistory;
use App\Charge;



class ProductController extends Controller
{
    

    
    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed']);
    }

 // check if admin has privilage
 public function checkPrivilegeadmin(String $name)
 {
   
     $exists = Auth::user()->admin->privileges->contains($name);
 
     return $exists;
     if (!$exists) {
        
         return redirect()->back();
     }
 
     return true;
 
 }

    
               // check if employee has privilage
public function checkPrivilege(String $name)
{
  
    $exists = Auth::user()->restaurant->admin->privileges->contains($name);

    return $exists;
    if (!$exists) {
       
        return redirect()->back();
    }

    return true;

}

    public function productNoQntfunction(){
        
       // $products = Product::where('user_id',Auth::user()->id)->get();
        $products = Auth::user()->restaurant->products()->get();
        $productNoQnt = array();
        foreach($products as $product)
        {
            
            $productWest = DB::table('product_versions')
            ->where('product_id',$product->id)
            ->sum('product_versions.qntSTK');
            
        
            if ($product->limiteSTK >= $productWest) {
           
                array_push($productNoQnt,  $product);
        
            }
        
        
        }
        
        //dd($productNoQnt);
        return $productNoQnt;
        
            }



public function productsListRes(){

        
$this->checkPrivilege("stocks");
$productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
$tasks = Auth::user()->restaurant->tasks()->get();
$products = DB::table('products')
->select('products.*', DB::raw("SUM(product_versions.qntSTK) as qntSTKto"))
->leftJoin('product_versions',  'product_versions.product_id', '=','products.id')
->leftJoin('restaurants',  'restaurants.id', '=','products.restaurant_id')
->where('restaurants.id', Auth::user()->restaurant->id )
->groupBy('products.id')
->get();





return view('product.productsListRes',compact('productNoQnt','privileges','tasks','products'));



}






    public function addProduct()
    {
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
        $tasks = Auth::user()->restaurant->tasks()->get();
     //   $providers = Provider::where('user_id',Auth::user()->id)->get();
        $providers = Auth::user()->restaurant->providers()->get();
        return view('product.addProduct',compact('providers','productNoQnt','privileges','tasks'));

    }

//======================================================================================//

    public function addProductForm() 
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

   
    
          $me->restaurant()->associate(Auth::user()->restaurant);
          $me->save();


           //registre the transation of this employee adding version 
         
    $transactionHistory = new TransactionHistory;
    $transactionHistory->qnt = $data['qntSTK'];
    $transactionHistory->type = "addnew";
    $transactionHistory->restaurant()->associate(Auth::user()->restaurant);
    $transactionHistory->productVersion()->associate($version);
    $transactionHistory->save();

 

    //add charge   mazalha f test

    $charge = new Charge;
    $charge->priceCharge = $data['price'] * $data['qntSTK'];
    $charge->type = "stock";
    $charge->note = "restaurant added new version of product";
    //$charge->employee()->associate(Auth::user());
    $charge->restaurant()->associate(Auth::user()->restaurant);
    $charge->save();

     
    
            
         return redirect()->back()->with("success"," Product added with success !");

    }
    
//======================================================================================//
    public function adminaddProductForm() 
    {
        $data = request()->validate([
            'productName' => 'required',

            'productName_ar' => '',
        
            'unity' => 'required',
          
            'tax' => 'required',
         
        
     
            'limiteSTK' => 'required',
  

          
        ]);
     

            $me = Product::create([
        
                'productName'=> $data['productName'],
        
                'productName_ar'=> $data['productName_ar'],
                'unity'=>  $data['unity'],
                'limiteSTK'=>  $data['limiteSTK'],
                'tax'=>  $data['tax'],
            
                ]);

          $me->admin()->associate(Auth::user()->admin);
          $me->save();
     
    
            
         return redirect()->back()->with("success"," Product added with success !");

    }

    public function adminAddProduct()
    {

        $this->checkPrivilegeadmin("customers");
        $privileges = Auth::user()->admin->privileges()->get();


        
        $tasks = Auth::user()->superAdmin->tasks()->get();
      //  $providers = Provider::where('user_id',Auth::user()->id)->get();
     

        return view('product.adminAddProduct',compact('privileges','tasks'));

    }


    

 



}
