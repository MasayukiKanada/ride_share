<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Models\Contract;
use App\Models\User;
use App\Models\Driver;
use App\Mail\ReserveConfirmMail;
use App\Mail\ReserveConfirmToDriverMail;

class ContractController extends Controller
{

    /*-----------------------------------
    -- 利用者側
    -----------------------------------*/
    public function index() {
        $userID = Auth::id();
        $today = date('Y-m-d');
        //本日よりも前の予約履歴を検索
        $before_cons = DB::table('contracts')->Where('user_id', $userID)->whereDate('con_date','>', $today )->orderBy('con_date', 'asc')->get();
        //本日以後の予約履歴を検索
        $after_cons = DB::table('contracts')->Where('user_id', $userID)->whereDate('con_date','<=', $today )->orderBy('con_date', 'desc')->get();
        return view('user.contracts.index', compact('userID','before_cons', 'after_cons'));
    }

    public function show($id){
        $contract = DB::table('contracts')->find($id);
        return view('user.contracts.show', compact('contract'));
    }

    public function create(){
        $user = Auth::user();
        //新規予約の日付初期値を7日後に設定
        $defaultDate = date("Y-m-d", strtotime("+7 day"));
        return view('user.contracts.create', compact('user','defaultDate'));
    }

    public function select(Request $request){
        $inputs = $request->all();
        $req_date = $request->req_date;
        $req_on_time = $request->req_on_time;
        $req_off_time = $request->req_off_time;
        $req_number = $request->req_number;
        //（利用者側の）利用希望日・時間・人数に合う（ドライバー側の）提供希望日・時間・定員を検索する
        $offers = DB::table('driver_offers')->where('offer_date', $req_date)->where('offer_on_time','<', $req_on_time)->where('offer_off_time', '>', $req_off_time)->where('offer_capacity', '>', $req_number)->orderBy('offer_fee', 'asc')->get();
        return view('user.contracts.select', compact('inputs', 'offers'));
    }

    public function confirm(Request $request){
        //新規予約画面に戻る
        if($request->has('back')) {
            $user = Auth::user();
            $inputs = $request->all();
            //新規予約の日付初期値を7日後に設定
            $defaultDate = date("Y-m-d", strtotime("+7 day"));
            return view('user.contracts.create', compact('user', 'inputs', 'defaultDate'));
        }

        $inputs = $request->all();
        return view('user.contracts.confirm', compact('inputs'));
    }

    public function store(Request $request){
        //候補一覧画面に戻る
        if($request->has('back')) {
            $inputs = $request->all();
            $req_date = $request->req_date;
            $req_on_time = $request->req_on_time;
            $req_off_time = $request->req_off_time;
            $req_number = $request->req_number;
            //（利用者側の）利用希望日・時間・人数に合う（ドライバー側の）提供希望日・時間・定員を検索する
            $offers = DB::table('driver_offers')->where('offer_date', $req_date)->where('offer_on_time','<', $req_on_time)->where('offer_off_time', '>', $req_off_time)->where('offer_capacity', '>', $req_number)->get();
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
        $contract->con_car = $request->offer_car;
        $contract->con_number = $request->req_number;
        $contract->save();

        $user = User::findOrFail(Auth::id());
        $driver = Driver::findOrFail($contract->driver_id);
        Mail::send(new ReserveConfirmMail($contract, $user));
        Mail::send(new ReserveConfirmToDriverMail($contract, $driver));

        return view('user.contracts.complete')->with('status', 'contract-stored');
    }

    public function destroy($id){
        $contract = Contract::find($id);
        $contract->delete();

        return view('user.contracts.complete')->with('status', 'contract-destroyed');
    }


    /*-----------------------------------
    -- ドライバー側
    -----------------------------------*/

    public function DriverIndex() {
        $driverID = Auth::id();
        $today = date('Y-m-d');
        //本日よりも前の予約履歴を検索
        $before_cons = DB::table('contracts')->Where('driver_id', $driverID)->whereDate('con_date','>', $today )->orderBy('con_date', 'asc')->get();
        //本日以後の予約履歴を検索
        $after_cons = DB::table('contracts')->Where('driver_id', $driverID)->whereDate('con_date','<=', $today )->orderBy('con_date', 'desc')->get();
        return view('driver.contracts.index', compact('driverID','before_cons', 'after_cons'));
    }

    public function DriverShow($id){
        $contract = DB::table('contracts')->find($id);
        return view('driver.contracts.show', compact('contract'));
    }


}
