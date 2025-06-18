<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Models\User;

class UserLoginController extends Controller
{
    // Display all user login history
    public function index()
    {
        $logins = UserLogin::with('user')->latest()->paginate(20);
        return view('admin.user_logins.index', compact('logins'));
    }

    // Optionally, display login history for a specific user
    public function user($userId)
    {
        $user = User::findOrFail($userId);
        $logins = UserLogin::where('user_id', $userId)->latest()->paginate(20);
        return view('admin.user_logins.user', compact('user', 'logins'));
    }
}
