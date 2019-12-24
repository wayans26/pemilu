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
        $data = tbstatus::where([
            'status'    => 'online'
        ])->get();

        if(sizeof($data) > 0){
            return json_encode(array(
                'status'    => 1,
                'message'   => 'berhasil',
                'data'      => $data
            ));
        }
        else{
            return json_encode(array(
                'status'    => 0,
                'message'   => 'Gagal'
            ));
        }
    }
}
