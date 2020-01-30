<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbkandidat;
use App\Database\tbpemilih;
use App\Database\tbdetailsuara;
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
            $total = tbpemilih::where(['level' => 'Peserta'])->count();
            $suara = tbdetailsuara::count();
            $data = DB::table('tbkandidat as kandidat')
            ->join('tbtotalsuara as total', 'kandidat.nim','=','total.nim')
            ->select('kandidat.nama_lengkap', 'total.totalsuara')->get();
            return json_encode(array(
                'total' => array(
                    'totalPemilih'  => $suara,
                    'totalSuara'    => $total
                ),
                'data'  => $data
            ));
        }
        else{
            abort(500);
        }
    }
}
