<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

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

        $user = User::findOrFail(Auth::id());
        $userID = Auth::id();
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->zip = $request->zip;
        $user->pref = $request->pref;
        $user->town = $request->town;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        if ($request->gender =='男性'){$request['gender'] = 0;}
        elseif($request->gender == '女性'){$request['gender'] = 1;}
        else{$request['gender'] = 2;}
        $user->gender = $request['gender'];
        $user->save();
        return view('user.complete', compact('userID'))->with('status', 'user-stored');
    }
}
