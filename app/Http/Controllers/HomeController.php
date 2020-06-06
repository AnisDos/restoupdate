<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }


    public function changeLang()
    {
        $data = request()->validate([
            'lang' => 'required',
        
        ]);
      //  dd($data);
        //App::setlocale($data['lang']);
      //  dd(App::getlocale());
      Session::put('locale', $data['lang']);
       // return redirect()->back()->with("success"," Product added with success !");
       return redirect()->back();

    }

    
  
    public function changeLangBlack()
    {
        
      //  dd($data);
        //App::setlocale($data['lang']);
      //  dd(App::getlocale());
      if (Session::get('black')) {
        Session::put('black', false);
      }else{
        Session::put('black', true);
      }
      
       // return redirect()->back()->with("success"," Product added with success !");
       return redirect()->back();

    }



}
