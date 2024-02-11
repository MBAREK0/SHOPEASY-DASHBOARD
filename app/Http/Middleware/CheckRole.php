<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permessions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            
            $commingPath = preg_replace('/\/\w+/', '', $request->path());
          
            if (session()->has('user_id')) {
                
                if(session()->has('user_role')){
                                $roleId = session('user_role');

                        $permissions = DB::table('permessions as P')
                            ->select('P.route')
                            ->join('role_permissions as RP', 'P.id', '=', 'RP.id_permissions')
                            ->join('roles as R', 'R.id', '=', 'RP.id_role')
                            ->where('R.id', $roleId)
                            ->get();

                        $routes =  $permissions->toArray();  
                        $cleanedRoutePaths = [];

                            foreach ($routes as $route) {
                                $routePath = $route->route;
                                $cleanedRoutePath = preg_replace('/\/{\w+}/', '', $routePath);
                                $cleanedRoutePaths[] = $cleanedRoutePath;
                                }

                        if (in_array($commingPath, $cleanedRoutePaths)){
                            Session::flash('sidebar_links', $cleanedRoutePaths);
                            return $next($request);
                        }else{
                            return abort(404);
                        }
                }
                        return redirect('/');
                       
            } else {
                        return redirect('/login');
                }
    }
}
