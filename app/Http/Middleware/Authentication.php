<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authentication
{
    
    protected $dashboards = [
        'admin' => '/userlist',
        'user'  => '/taskShow',
    ];

    public function handle(Request $request, Closure $next, $role = null): Response
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();

       
        if ($role && $user->role !== $role) {
            $redirect = $this->dashboards[$user->role] ?? '/';
            return redirect($redirect)->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
