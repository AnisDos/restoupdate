<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {

            
            if (Auth::user()->admin()->exists()) {
           
                return $next($request);
    
            } elseif (Auth::user()->restaurant()->exists()) {
                
            return redirect ('restaurant'); 
    
            }elseif (Auth::user()->employee()->exists()) {
    
                return redirect ('employee'); 
    
            }elseif (Auth::user()->superadmin()->exists()) {
    
                return redirect ('superadmin'); 
    
            }
       
            
        }
        return redirect('/');
    }
}
