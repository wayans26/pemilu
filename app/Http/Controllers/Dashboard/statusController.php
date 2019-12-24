<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbstatus;
use Session;

class statusController extends Controller
{
    //
    function index(Request $req){
        if($req->session()->get('level') === 'Admin'){
            return view('Page.status');
        }
        else{
            abort(404);
        }
    }

    function getStatus(Request $req){
        if($req->session()->get('level') === 'Admin'){
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
        else{
            abort(500);
        }
    }
}
