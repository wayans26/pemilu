<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbstatus;

class statusController extends Controller
{
    //
    function index(Request $req){
        return view('Page.status');
    }

    function getStatus(Request $req){
        return "masuk";
    }
}
