<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use App\Models\Menu;
class Right
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
        $user = \Auth::user();

        if($user->role_id != 1)
        {
            $controller = \Request::segment(2);
                
            if(!empty($controller))
            {
                $cek =  Role::find($user->role_id);
                
                if(empty($cek->menus()->whereSlug($controller)->first()->id))
                {
                    
                    return redirect('auth/authorized');

                }
            }
        }

        return $next($request);
        
        
        
        
    }
}
