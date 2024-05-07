<?php

namespace App\Http\Middleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Closure;
use Illuminate\Http\Request;

class Admin
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
       $data =  request()->all(); 
       
        if (!auth()->check() ) {
            return redirect()->route('admin/login');
        }
        $user = (auth()->user());
        foreach ($user->roles as $role) {
         if($role->id == 14){
            return redirect()->route('admin/login');
         }
        }
        return $next($request);
    }
}
