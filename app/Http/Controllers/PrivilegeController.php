<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privilege;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
class PrivilegeController extends Controller
{
    

    
    public function __construct()
    {
        $this->middleware(['auth','isusernotconfirmed']);
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

//====================================================  ============================================




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






    public function addPrivilegeToUser()
    {
        $this->checkPrivilege("employee");
            $productNoQnt = $this->productNoQntfunction();
$privileges = Auth::user()->restaurant->admin->privileges()->get();
$tasks = Auth::user()->restaurant->tasks()->get();
        
     //   $employees = Employee::where('user_id', Auth::user()->id)->get();
        $employees =Auth::user()->restaurant->employees()->get();

        return view('privilege.addPrivilegeToUser', compact('employees','productNoQnt','privileges','tasks'));

    }

//====================================================================
//====================================================================
    

    public function addPrivilegeToUserFormForUpdate(Employee $employee) 
    {     //  $this->checkPrivilege("employee");
        $productNoQnt = $this->productNoQntfunction();
        $privileges = Auth::user()->restaurant->admin->privileges()->get();
        $tasks = Auth::user()->restaurant->tasks()->get();
        
       
        $privilegesEmployees = $employee->privileges;
        $olkl = Employee::where('restaurant_id',Auth::user()->restaurant->id)->where('id',$employee->id)->exists();
        if ($olkl) {
            return view('privilege.addPrivilegeToUserFormForUpdate', compact('employee','privileges','tasks','privilegesEmployees','productNoQnt'));

        } else {
               
return redirect()->back()->with("danger"," please don't play with that !!! Do your job seriously");

        }
        
        
     
    }


   
//====================================================================
//==================================================================== 

    public function updatePrivilege() 
    {  
        $data = request()->validate([
            
            'var'=>  '',
            'id_employee'=>'',
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


             $employee = Employee::find($data['id_employee']);	

     //delete employee privilege and recreate theme

     $employee->privileges()->detach();
  
     
         //create employee privilege of meal
   

         if ($stack[0] != "" ) {
   
           
            $employee->privileges()->attach($stack);

        
        
        }


     
            
         return redirect()->back()->with("success"," employee privileges updated with success !");

    }


}
