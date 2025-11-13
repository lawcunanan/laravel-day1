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

    public function login(AuthLoginRequest $request) {
       
         try {
       
                $validated = $request->validated();

                
                $user = User::where('email', $validated['email'])
                            ->where('status', 'active')
                            ->first();

            
                if ($user && Hash::check($validated['password'], $user->password)) {
                    Auth::login($user);
                    $request ->session()->regenerate();
                    

                    return redirect()->route('showTasks.index')
                                    ->with('success', 'Login successful.');
                }

            
                return redirect()->back()->with('error', 'Invalid email, password, or account inactive.');

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
}
