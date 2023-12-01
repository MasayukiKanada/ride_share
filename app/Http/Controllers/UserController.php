<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function show() {
        $userID = Auth::id();
        $users = DB::table('users')->where('id', $userID)->get();
        return view('user.show', compact('users'));
    }

    public function edit() {
        $userID = Auth::id();
        $users = DB::table('users')->where('id', $userID)->get();
        return view('user.edit', compact('users'));
    }
}
