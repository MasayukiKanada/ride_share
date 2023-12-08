<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function show() {
        $driverID = Auth::id();
        $drivers = DB::table('drivers')->where('id', $driverID)->get();
        return view('driver.show', compact('drivers'));
    }

    public function edit() {
        $driverID = Auth::id();
        $drivers = DB::table('drivers')->where('id', $driverID)->get();
        return view('driver.edit', compact('drivers'));
    }

    public function confirm(Request $request) {
        $inputs = $request->all();
        return view('driver.confirm', compact('inputs'));
    }

    public function update(Request $request) {
        if($request->has('back')) {
            $driverID = Auth::id();
            $drivers = DB::table('drivers')->where('id', $driverID)->get();
            $inputs = $request->all();
            return view('driver.edit', compact('drivers', 'inputs'));
        }

        $driver = Driver::findOrFail(Auth::id());
        $driverID = Auth::id();
        $driver->email = $request->email;
        $driver->tel = $request->tel;
        $driver->zip = $request->zip;
        $driver->pref = $request->pref;
        $driver->town = $request->town;
        $driver->address = $request->address;
        $driver->birthday = $request->birthday;
        if ($request->gender =='男性'){$request['gender'] = 0;}
        elseif($request->gender == '女性'){$request['gender'] = 1;}
        else{$request['gender'] = 2;}
        $driver->gender = $request['gender'];
        $driver->save();
        return view('driver.complete', compact('driverID'))->with('status', 'driver-stored');
    }
}
