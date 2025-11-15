<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardRedirectController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return $user->role === 'admin' ? redirect('/userlist') : redirect('/taskShow');
        }

        return view('auth.login');
    }
}
