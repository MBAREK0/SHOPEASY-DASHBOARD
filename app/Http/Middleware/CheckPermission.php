<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, ...$permissions)
    {
        if (!$this->authenticated()) {
            return redirect('/login');
        }
        foreach ($permissions as $permission) {
            if ($this->user()->can($permission)) {
                return $next($request);
            }
        }
        return redirect('/')->with('error', 'Unauthorized access');
    }

    protected function authenticated()
    {
        return session()->has('user_id');
    }

    protected function user()
    {
        return User::find(session('user_id'));
    }
}
