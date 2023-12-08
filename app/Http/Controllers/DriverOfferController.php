<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;
use App\Models\Driver;
use App\Models\DriverOffer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DriverOfferController extends Controller
{
    public function index() {
        $driverID = Auth::id();
        $today = date('Y-m-d');
        //本日よりも前の予約履歴を検索
        $before_offers = DB::table('driver_offers')->Where('driver_id', $driverID)->whereDate('offer_date','>', $today )->get();
        //本日以後の予約履歴を検索
        $after_offers = DB::table('driver_offers')->Where('driver_id', $driverID)->whereDate('offer_date','<=', $today )->get();
        return view('driver.offers.index', compact('driverID','before_offers', 'after_offers'));
    }

    public function create(){
        $user = Auth::user();
        //新規オファーの日付初期値を7日後に設定
        $defaultDate = date("Y-m-d", strtotime("+7 day"));
        return view('driver.offers.create', compact('user','defaultDate'));
    }

    public function confirm(Request $request){
        $inputs = $request->all();
        return view('driver.offers.confirm', compact('inputs'));
    }

    public function store(Request $request){
        //新規オファー画面に戻る
        if($request->has('back')) {
            $user = Auth::user();
            $inputs = $request->all();
            //新規オファーの日付初期値を7日後に設定
            $defaultDate = date("Y-m-d", strtotime("+7 day"));
            return view('driver.offers.create', compact('user', 'inputs', 'defaultDate'));
        }

        $offer = new DriverOffer;
        $offer->driver_id = Auth::id();
        $offer->offer_date = $request->offer_date;
        $offer->offer_on_place = $request->offer_on_place;
        $offer->offer_on_time = $request->offer_on_time;
        $offer->offer_off_place = $request->offer_off_place;
        $offer->offer_off_time = $request->offer_off_time;
        $offer->offer_car = $request->offer_car;
        $offer->offer_capacity = $request->offer_capacity;
        $offer->offer_fee = $request->offer_fee;
        $offer->save();
        return view('driver.offers.complete')->with('status', 'offer-stored');
    }

}
