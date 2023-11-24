<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index() {
        $before_cons = DB::table('contracts')->whereDate('con_date','>','date("Y-m-d")' )->get();
        $after_cons = DB::table('contracts')->whereDate('con_date','<','date("Y-m-d")' )->get();
        //dd($before_cons);

        return view('user.contracts.index', compact('before_cons', 'after_cons'));
    }

    public function create(){
        return view('user.contracts.create');
    }
}
