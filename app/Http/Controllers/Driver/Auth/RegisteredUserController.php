<?php

namespace App\Http\Controllers\Driver\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('driver.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:7'],
            'pref' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', 'integer'],
            'driver_licence' => ['required', 'string', 'max:12'],
            'own_car' => ['required', 'string', 'max:255'],
            'own_capacity' => ['required', 'string', 'max:3'],
            'accident' => ['required', 'string', 'max:5'],
            'basic_fee' => ['required', 'string', 'max:12'],
            'bank_name' => ['required', 'string', 'max:255'],
            'bank_branch' => ['required', 'string', 'max:255'],
            'bank_account' => ['required', 'string', 'max:255'],
            'account_name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $driver = Driver::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'zip' => $request->zip,
            'pref' => $request->pref,
            'town' => $request->town,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'driver_licence' => $request->driver_licence,
            'own_car' => $request->own_car,
            'own_capacity' => $request->own_capacity,
            'accident' => $request->accident,
            'rank' => '0',
            'basic_fee' => $request->basic_fee,
            'bank_name' => $request->bank_name,
            'bank_branch' => $request->bank_branch,
            'bank_account' => $request->bank_account,
            'account_name' => $request->account_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($driver));

        Auth::guard('drivers')->login($driver);

        return redirect(RouteServiceProvider::DRIVER_HOME);
    }
}
