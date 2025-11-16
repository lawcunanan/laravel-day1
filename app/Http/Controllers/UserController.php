<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    
    public function index() {
        $users = User::
            with(['tasks' => function ($query) {
                $query->where('TaskStatus', 'incomplete')
                ->orderBy('created_at', 'asc');
            }])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('userlist', compact('users'));
    }

     public function statusUser(User $user, string $status) {
        try {
            $user->status = $status;
            $user->update();

            return redirect()->route('userList.index')->with('success', 'User status updated successfully.');
        } catch (QueryException $e) {
            Log::error('User status update failed: '.$e->getMessage());
            return redirect()->route('userList.index')->with('error', 'Failed to update user status. Please try again.');
        }
    }
}
