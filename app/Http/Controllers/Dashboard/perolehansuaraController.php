<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbkandidat;
use DB;

class perolehansuaraController extends Controller
{
    //
    function index(Request $req, loginModel $login){
        if($login->isAdmin()){          
            return view('Page.perolehansuara');
        }
        else{
            abort(404);
        }
    }

    function getPerolehansuara(Request $req, loginModel $login){
        if($login->isAdmin()){
            $data = DB::table('tbkandidat as kandidat')
            ->join('tbtotalsuara as total', 'kandidat.nim','=','total.nim')
            ->select('kandidat.nama_lengkap', 'total.totalsuara')->get();
            return json_encode($data);
        }
        else{
            abort(500);
        }
    }
}
