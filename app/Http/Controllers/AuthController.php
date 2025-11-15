<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Database\QueryException; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    protected $dashboards = [
        'admin' => '/userlist',
        'user'  => '/taskShow',
    ];

    public function index() {
        $users = User::where('status', 'active')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('userlist', compact('users'));
    }
    
   
    public function login(AuthLoginRequest $request) {
       
         try {
       
                $validated = $request->validated();

                
                $user = User::where('email', $validated['email'])
                            ->where('status', 'active')
                            ->first();

            
                if ($user && Hash::check($validated['password'], $user->password)) {
                    Auth::login($user);
                    $request ->session()->regenerate();
                    
                    $redirect = $this->dashboards[$user->role] ?? '/'; 
                    return redirect($redirect)
                                    ->with('success', 'Login successful.');
                }
                
                return redirect('/')->with('error', 'The provided credentials do not match our records.');
                  
            } catch (QueryException $e) {
                
                Log::error('Login failed: '.$e->getMessage());
                return redirect()->back()->with('error', 'Login failed. Please try again.');
           }
        
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Logged out successfully.');
    }

     public function register(AuthRegisterRequest $request) {
        try {
            $validated = $request->validated();
            User::create($validated);

            return redirect('/')->with('success', 'Registration successful. You can now log in.');
        } catch (QueryException $e) {
            Log::error('Registration failed: '.$e->getMessage());
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }


    public function deactivateUser(User $user) {
        try {
            $user->status = 'inactive';
            $user->update();

            return redirect()->route('userList.index')->with('success', 'User deactivated successfully.');
        } catch (QueryException $e) {
            Log::error('User deactivation failed: '.$e->getMessage());
            return redirect()->route('userList.index')->with('error', 'Failed to deactivate user. Please try again.');
        }
    }
}
