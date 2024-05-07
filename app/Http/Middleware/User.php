<?php

namespace App\Http\Middleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('user.login');
        }
        $user_type = (auth()->user()->user_type);
         if($user_type == 'admin' || $user_type == 'expert'){
            
            return redirect()->route('user.login');
         }
        
        return $next($request);
    }
}
