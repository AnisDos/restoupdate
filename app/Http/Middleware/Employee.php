<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        if (Auth::user()) {

            
            if (Auth::user()->admin()->exists()) {
                return redirect ('admin'); 
                
    
            } elseif (Auth::user()->restaurant()->exists()) {
                
                return redirect ('restaurant'); 

            }elseif (Auth::user()->employee()->exists()) {
                if (!Auth::user()->employee->active) {    return redirect ('blocked');     }
                return $next($request);
    
            }elseif (Auth::user()->superadmin()->exists()) {
    
                return redirect ('superadmin'); 
    
            }
       
            
        }


        return redirect ('/'); 
    }
}
