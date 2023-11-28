<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index() {
        $userID = Auth::id();
        $before_cons = DB::table('contracts')->Where('id', $userID)->whereDate('con_date','>','date("Y-m-d")' )->get();
        $after_cons = DB::table('contracts')->Where('id', $userID)->whereDate('con_date','<','date("Y-m-d")' )->get();
        //dd($before_cons);

        return view('user.contracts.index', compact('userID','before_cons', 'after_cons'));
    }

    public function create(){
        $user = Auth::user();
        $defaultDate = date("Y-m-d", strtotime("+7 day"));
        return view('user.contracts.create', compact('user', 'defaultDate'));
    }

    public function select(Request $request){
        $req_on_place = $request->req_on_place;
        $req_on_time = $request->req_on_time;
        $req_off_place = $request->req_off_place;
        $req_off_time = $request->req_off_time;
        $req_number = $request->req_number;
        $req_date = $request->req_date;
        $offers = DB::table('driver_offers')->where('offer_date', $req_date)->get();
        return view('user.contracts.select', compact('req_on_place','req_on_time','req_off_place','req_off_time','req_number', 'offers', 'req_date'));
    }
    public function confirm(Request $request){
        $inputs = $request->all();
        return view('user.contracts.confirm', compact('inputs'));
    }
}
