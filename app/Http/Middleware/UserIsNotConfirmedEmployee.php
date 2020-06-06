<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class UserIsNotConfirmedEmployee
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
            if (Auth::user()->employee()->exists()) {
                if (!Auth::user()->employee->restaurant->admin->verified) {
                    return redirect('notVerifiedForEmployee');
                }
                return $next($request);
                
    
            }
        }
       
        
       
    }
}
