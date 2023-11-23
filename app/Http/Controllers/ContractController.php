<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    public function index() {
        $values = Contract::all();
        
        //dd($values);

        return view('user.contracts', compact('values'));
    }
}
