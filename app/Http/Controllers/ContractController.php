<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index() {
        $before_cons = DB::table('contracts')->whereDate('con_date','>','date("Y-m-d")' )->get();
        $after_cons = DB::table('contracts')->whereDate('con_date','<','date("Y-m-d")' )->get();
        //dd($before_cons);

        return view('user.contracts', compact('before_cons', 'after_cons'));
    }
}
