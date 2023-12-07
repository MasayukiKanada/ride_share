<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DriverOfferController extends Controller
{
    public function DriverIndex() {
        $driverID = Auth::id();
        $today = date('Y-m-d');
        //本日よりも前の予約履歴を検索
        $before_cons = DB::table('driver_offers')->Where('driver_id', $driverID)->whereDate('offer_date','>', $today )->get();
        //本日以後の予約履歴を検索
        $after_cons = DB::table('driver_offers')->Where('driver_id', $driverID)->whereDate('offer_date','<=', $today )->get();
        return view('driver.offers.index', compact('driverID','before_cons', 'after_cons'));
    }

    public function DriverCreate(){
        $user = Auth::user();
        //新規予約の日付初期値を7日後に設定
        $defaultDate = date("Y-m-d", strtotime("+7 day"));
        return view('driver.offers.create', compact('user','defaultDate'));
    }

}
