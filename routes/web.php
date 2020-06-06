<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/khra', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect('home');
});
Route::get('/notVerified', function () {
    return view('pages.notVerified');
});
Route::get('/notVerifiedRestaurant', function () {
    return view('pages.notVerifiedRestaurant');
});
Route::get('/notVerifiedForEmployee', function () {
    return view('pages.notVerifiedForEmployee');
});

Route::get('/blocked', function () {
    return view('pages.blocked');
});



Route::get('/lang', function () {
  
    App::setlocale('ar');
    dd(App::getlocale());


});




Route::get('/home', 'HomeController@index')->name('home');

Route::post('/changeLang', 'HomeController@changeLang');


Route::post('/changeLangBlack', 'HomeController@changeLangBlack');


//super Admin

Route::get('/superadmin',   'SuperAdminController@index')->middleware('issuperadmin');
Route::get('/superadmin/generatekey',   'SuperAdminController@generatekey')->middleware('issuperadmin');
Route::post('/superadmin/generatekeyform',   'SuperAdminController@generatekeyform')->middleware('issuperadmin');
Route::get('/superadmin/showRestaurantWithKey',   'SuperAdminController@showRestaurantWithKey')->middleware('issuperadmin');
Route::get('/superadmin/showRestaurantAllInfo',   'SuperAdminController@showRestaurantAllInfo')->middleware('issuperadmin');
Route::get('/superadmin/showRestaurantAllInfoByOne/{user}',   'SuperAdminController@showRestaurantAllInfoByOne')->middleware('issuperadmin');
Route::get('/superadmin/showRevenu',   'SuperAdminController@showRevenu')->middleware('issuperadmin');
Route::get('/superadmin/showtotalecompte',   'SuperAdminController@showtotalecompte')->middleware('issuperadmin');
Route::post('/superadmin/adminUpdatePrivileges',   'SuperAdminController@adminUpdatePrivileges')->middleware('issuperadmin');
Route::get('/superadmin/accountsettings/{superadmin}',   'SuperAdminController@accountsettings')->middleware('issuperadmin');
Route::post('/superadmin/updateSuperadminInfo',   'SuperAdminController@updateSuperadminInfo')->middleware('issuperadmin');
Route::post('/superadmin/updatePasswordSuperadmin',   'SuperAdminController@updatePasswordSuperadmin')->middleware('issuperadmin');


Route::post('/superadmin/sendTodo','SuperAdminController@sendTodo')->middleware('issuperadmin');
Route::post('/superadmin/deleteTodo','SuperAdminController@deleteTodo')->middleware('issuperadmin');
Route::post('/superadmin/sendNewTodo','SuperAdminController@sendNewTodo')->middleware('issuperadmin');



// admin route

Route::get('/admin',   'AdminController@index')->middleware('isadmin');
Route::get('/admin/addRestaurant',   'AdminController@addRestaurant')->middleware('isadmin');
Route::post('/admin/addRestaurantFormValidation',   'AdminController@addRestaurantFormValidation')->middleware('isadmin');
Route::get('/admin/restaurantsList',   'AdminController@restaurantsList')->middleware('isadmin');
Route::get('/admin/restaurantDetails/{restaurant}',   'AdminController@restaurantDetails')->middleware('isadmin');
Route::post('/admin/updateRestaurantInfo',   'AdminController@updateRestaurantInfo')->middleware('isadmin');
Route::post('/admin/updatePasswordRestaurant',   'AdminController@updatePasswordRestaurant')->middleware('isadmin');
Route::post('/admin/decativateRestaurant',   'AdminController@decativateRestaurant')->middleware('isadmin');
Route::get('/admin/accountsettings/{admin}',   'AdminController@accountsettings')->middleware('isadmin');
Route::post('/admin/updateadminInfo',   'AdminController@updateadminInfo')->middleware('isadmin');
Route::post('/admin/updatePasswordadmin',   'AdminController@updatePasswordadmin')->middleware('isadmin');



// admin meal route
Route::get('/admin/addMeal','AdminController@addMeal')->middleware('isadmin');
Route::post('/admin/addMealForm','AdminController@addMealForm')->middleware('isadmin');
Route::get('/admin/mealsList','AdminController@mealsList')->middleware('isadmin');
Route::get('/admin/mealDetails/{meal}','AdminController@mealDetails')->middleware('isadmin');
Route::get('/admin/updateMeal/{meal}','AdminController@updateMeal')->middleware('isadmin');
Route::post('/admin/updateMealForm','AdminController@updateMealForm')->middleware('isadmin');
Route::get('/admin/addCategory','AdminController@addCategory')->middleware('isadmin');
Route::post('/admin/addCategoryForm','AdminController@addCategoryForm')->middleware('isadmin');
Route::post('/admin/updateNameCategory','AdminController@updateNameCategory')->middleware('isadmin');


Route::post('/admin/deactivateMeal','AdminController@deactivateMeal')->middleware('isadmin');
Route::post('/admin/activateMeal','AdminController@activateMeal')->middleware('isadmin');

//admin product

Route::get('/admin/addProduct','ProductController@adminAddProduct')->middleware('isadmin');
Route::post('/admin/addProductForm','ProductController@adminaddProductForm')->middleware('isadmin');


//admin customers

Route::get('/admin/allCustomers','AdminController@allCustomers')->middleware('isadmin');



Route::post('/admin/chekKeyForm','KeyController@chekKeyForm');

//admin chart




Route::get('/admin/others','AdminController@others')->middleware('isadmin');
Route::get('/admin/promoCode','AdminController@promoCode')->middleware('isadmin');
Route::post('/admin/addCodePromo','AdminController@addCodePromo')->middleware('isadmin');
Route::post('/admin/deletePromo','AdminController@deletePromo')->middleware('isadmin');
Route::get('/admin/checkPromo/{promo}','AdminController@checkPromo')->middleware('isadmin');

Route::post('/admin/sendTodo','AdminController@sendTodo')->middleware('isadmin');
Route::post('/admin/deleteTodo','AdminController@deleteTodo')->middleware('isadmin');
Route::post('/admin/sendNewTodo','AdminController@sendNewTodo')->middleware('isadmin');











// restaurant route
Route::get('/restaurant', 'RestaurantController@index')->middleware('isrestaurant');

Route::get('/restaurant/addCategory','RestaurantController@addCategory')->middleware('isrestaurant');
Route::post('/restaurant/addCategoryForm','RestaurantController@addCategoryForm')->middleware('isrestaurant');
Route::post('/restaurant/updateNameCategory','RestaurantController@updateNameCategory')->middleware('isrestaurant');




//restaurant meal route
Route::get('/restaurant/addMeal','RestaurantController@addMeal')->middleware('isrestaurant');
Route::post('/restaurant/addMealForm','RestaurantController@addMealForm')->middleware('isrestaurant');
Route::get('/restaurant/mealsList','RestaurantController@mealsList')->middleware('isrestaurant');
Route::get('/restaurant/mealDetails/{meal}','RestaurantController@mealDetails')->middleware('isrestaurant');
Route::get('/restaurant/updateMeal/{meal}','RestaurantController@updateMeal')->middleware('isrestaurant');
Route::post('/restaurant/updateMealForm','RestaurantController@updateMealForm')->middleware('isrestaurant');
Route::post('/restaurant/deactivateMeal','RestaurantController@deactivateMeal')->middleware('isrestaurant');
Route::post('/restaurant/activateMeal','RestaurantController@activateMeal')->middleware('isrestaurant');




//restaurant product

Route::get('/restaurant/addProduct','ProductController@addProduct')->middleware('isrestaurant');
Route::post('/restaurant/addProductForm','ProductController@addProductForm')->middleware('isrestaurant');
Route::get('/restaurant/addVersionProduct','RestaurantController@addVersionProduct')->middleware('isrestaurant');
Route::post('/restaurant/addVersionProductForm','RestaurantController@addVersionProductForm')->middleware('isrestaurant');
Route::get('/restaurant/purchaseOrder/{product}','RestaurantController@purchaseOrder')->middleware('isrestaurant');
Route::get('/restaurant/productsList','ProductController@productsListRes')->middleware('isrestaurant');
Route::post('/restaurant/updateProduct','RestaurantController@updateProduct')->middleware('isrestaurant');



//retaurant customers

Route::get('/restaurant/allCustomers','RestaurantController@allCustomers')->middleware('isrestaurant');



//mail to provider
Route::post('/restaurant/send_mail', 'RestaurantController@mailsend')->middleware('isrestaurant');

//privilege

Route::get('/restaurant/addPrivilegeToUser','PrivilegeController@addPrivilegeToUser')->middleware('isrestaurant');
Route::get('/restaurant/addPrivilegeToUserFormForUpdate/{employee}','PrivilegeController@addPrivilegeToUserFormForUpdate')->middleware('isrestaurant');
Route::post('/restaurant/updatePrivilege','PrivilegeController@updatePrivilege')->middleware('isrestaurant');


//Provider

Route::get('/restaurant/addProvider','RestaurantController@addProvider')->middleware('isrestaurant');
Route::post('/restaurant/addProviderForm','RestaurantController@addProviderForm')->middleware('isrestaurant');


//employee
Route::get('/restaurant/addEmployee','RestaurantController@addEmployee')->middleware('isrestaurant');
Route::post('/restaurant/addEmployeeForm','RestaurantController@addEmployeeForm')->middleware('isrestaurant');
Route::get('/restaurant/employeeCharge','RestaurantController@employeeCharge')->middleware('isrestaurant');
Route::post('/restaurant/validatePayEmployee','RestaurantController@validatePayEmployee')->middleware('isrestaurant');
Route::get('/restaurant/allEmployee','RestaurantController@allEmployee')->middleware('isrestaurant');
Route::get('/restaurant/checkEmployeeByOne/{employee}','RestaurantController@checkEmployeeByOne')->middleware('isrestaurant');
Route::post('/restaurant/updateEmployyeInfo','RestaurantController@updateEmployyeInfo')->middleware('isrestaurant');
Route::post('/restaurant/updatePasswordEmployee',   'RestaurantController@updatePasswordEmployee')->middleware('isrestaurant');
Route::post('/restaurant/decativateEmployee',   'RestaurantController@decativateEmployee')->middleware('isrestaurant');



//Caisse
Route::get('/restaurant/addCaisse','RestaurantController@addCaisse')->middleware('isrestaurant');
Route::post('/restaurant/addCaisseForm','RestaurantController@addCaisseForm')->middleware('isrestaurant');
/* Route::get('/restaurant/allCaisses','RestaurantController@allCaisses')->middleware('isrestaurant'); */
Route::post('/restaurant/updateCaisse','RestaurantController@updateCaisse')->middleware('isrestaurant');

//charge
Route::get('/restaurant/addSupCharge','RestaurantController@addSupCharge')->middleware('isrestaurant');
Route::post('/restaurant/addSupChargeForm','RestaurantController@addSupChargeForm')->middleware('isrestaurant');

//weekProgram
Route::get('/restaurant/weekProgram','RestaurantController@weekProgram')->middleware('isrestaurant');
Route::post('/restaurant/weekProgramForm','RestaurantController@weekProgramForm')->middleware('isrestaurant');
Route::post('/restaurant/updateOneWeekProgramForm','RestaurantController@updateOneWeekProgramForm')->middleware('isrestaurant');
Route::post('/restaurant/deleteOneWeekProgramForm','RestaurantController@deleteOneWeekProgramForm')->middleware('isrestaurant');

//stockEstimate
Route::get('/restaurant/stockEstimate','RestaurantController@stockEstimate')->middleware('isrestaurant');
Route::post('/restaurant/estimationMealForm','RestaurantController@estimationMealForm')->middleware('isrestaurant');



//Caisse
Route::get('/restaurant/addDeliveryCompany','RestaurantController@addDeliveryCompany')->middleware('isrestaurant');
Route::post('/restaurant/addDeliveryCompanyForm','RestaurantController@addDeliveryCompanyForm')->middleware('isrestaurant');


Route::get('/restaurant/liveOrders','RestaurantController@liveOrders')->middleware('isrestaurant');


Route::get('/restaurant/historyTransactions','RestaurantController@historyTransactions')->middleware('isrestaurant');

Route::get('/restaurant/screens','RestaurantController@screens')->middleware('isrestaurant');
Route::post('/restaurant/addScreenForm','RestaurantController@addScreenForm')->middleware('isrestaurant');
Route::post('/restaurant/updateNameScreen','RestaurantController@updateNameScreen')->middleware('isrestaurant');






Route::post('/restaurant/sendTodo','RestaurantController@sendTodo')->middleware('isrestaurant');
Route::post('/restaurant/deleteTodo','RestaurantController@deleteTodo')->middleware('isrestaurant');
Route::post('/restaurant/sendNewTodo','RestaurantController@sendNewTodo')->middleware('isrestaurant');



// employee route

//Route::group(['prefix'=>'employee', 'middleware' => 'isemployee'], function(){


/* Route::get('/login','AuthEmployee\LoginController@showLoginForm')->name('employee.login');
Route::post('/login','AuthEmployee\LoginController@login')->name('employee.login.submit'); */




//Route::get('/employee','EmployeeController@index')->name('employee.home')->middleware('isemployee') ;
Route::get('/employee','EmployeeController@index')->middleware('isemployee') ;


//stocks
Route::get('/employee/stocks/UpdateQnttToProduct','EmployeeController@stocksUpdateQnttToProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/addQntProduct','EmployeeController@addQntProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/revokeQntProduct','EmployeeController@revokeQntProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/DeleteVersionProduct','EmployeeController@DeleteVersionProduct')->middleware('isemployee') ;
Route::get('/employee/stocks/versionProduct','EmployeeController@stocksversionProduct')->middleware('isemployee') ;
Route::post('/employee/stocks/addVersionProductForm','EmployeeController@addVersionProductForm')->middleware('isemployee') ;

Route::get('/employee/stocks/allProducts','EmployeeController@allProducts')->middleware('isemployee') ;
Route::get('/employee/stocks/addNewProduct','EmployeeController@addNewProduct')->middleware('isemployee') ;





Route::post('/employee/addProductFormEmployee','EmployeeController@addProductFormEmployee')->middleware('isemployee');
Route::post('/employee/updateProduct','EmployeeController@updateProduct')->middleware('isemployee');



Route::post('/employee/sendTodo','EmployeeController@sendTodo')->middleware('isemployee');
Route::post('/employee/deleteTodo','EmployeeController@deleteTodo')->middleware('isemployee');
Route::post('/employee/sendNewTodo','EmployeeController@sendNewTodo')->middleware('isemployee');
