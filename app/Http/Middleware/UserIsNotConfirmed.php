<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class UserIsNotConfirmed
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
                if (!Auth::user()->admin->verified) {
                    return redirect('notVerified');
                }
                return $next($request);
                
    
            } elseif (Auth::user()->restaurant()->exists()) {
            
                if (!Auth::user()->restaurant->admin->verified) {
                    return redirect('notVerifiedRestaurant');
                }
                return $next($request);
            }



           /*  if (Auth::user()->is_admin) {
                if (!Auth::user()->verified) {
                    return redirect('notVerified');
                }
                return $next($request);
            } */
           /*  if (!Auth::user()->user->verified) {
                return redirect('notVerifiedRestaurant');
            } */
          //  return $next($request);
        }
       // return $next($request);
    }
}
