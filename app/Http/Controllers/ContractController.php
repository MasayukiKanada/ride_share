<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    public function index() {
        $values = DB::table('contracts')->get();
        
        //dd($values);

        return view('user.contracts', compact('values'));
    }
}
