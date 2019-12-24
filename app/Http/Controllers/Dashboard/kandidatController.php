<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbkandidat;
use App\Login\loginModel;


class kandidatController extends Controller
{
    //
    function index(Request $eq, loginModel $login){
        if($login->isAdmin()){
            return view('Page.daftarkandidat');
        }
        else{
            abort(404);
        }
    }
}
