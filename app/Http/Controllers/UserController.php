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

    public function confirm(Request $request) {
        $inputs = $request->all();
        return view('user.confirm', compact('inputs'));
    }

    public function update(Request $request) {
        if($request->has('back')) {
            $userID = Auth::id();
            $users = DB::table('users')->where('id', $userID)->get();
            $inputs = $request->all();
            return view('user.edit', compact('users', 'inputs'));
        }

        $inputs = $request->all();
        return view('user.confirm', compact('inputs'));
    }
}
