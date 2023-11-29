<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;


class ContractController extends Controller
{
    public function index() {
        $userID = Auth::id();
        $today = date('Y-m-d');
        $before_cons = DB::table('contracts')->Where('id', $userID)->whereDate('con_date','>', $today )->get();
        $after_cons = DB::table('contracts')->Where('id', $userID)->whereDate('con_date','<', $today )->get();
        //dd($before_cons);

        return view('user.contracts.index', compact('userID','before_cons', 'after_cons'));
    }

    public function create(){
        $user = Auth::user();
        $defaultDate = date("Y-m-d", strtotime("+7 day"));
        return view('user.contracts.create', compact('user', 'defaultDate'));
    }

    public function select(Request $request){
        $inputs = $request->all();
        $req_date = $request->req_date;
        $offers = DB::table('driver_offers')->where('offer_date', $req_date)->get();
        return view('user.contracts.select', compact('inputs', 'offers'));
    }

    public function confirm(Request $request){
        $inputs = $request->all();
        return view('user.contracts.confirm', compact('inputs'));
    }

    public function store(Request $request){
        if($request->has('back')) {
            $inputs = $request->all();
            $req_date = $request->req_date;
            $offers = DB::table('driver_offers')->where('offer_date', $req_date)->get();
            return view('user.contracts.select', compact('inputs', 'offers'));
        }

        $contract = new Contract;
        $contract->user_id = Auth::id();
        $contract->driver_id = $request->driver_id;
        $contract->con_date = $request->req_date;
        $contract->con_on_place = $request->req_on_place;
        $contract->con_on_time = $request->req_on_time;
        $contract->con_off_place = $request->req_off_place;
        $contract->con_off_time = $request->req_off_time;
        $contract->con_fee = $request->offer_fee;
        $contract->con_number = $request->req_number;
        $contract->save();
        return redirect('user/contracts');
    }
}
