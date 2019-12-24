<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbdetailsuara;
use DB;

class detailsuaraController extends Controller
{
    //
    function index(Request $req, loginModel $login){
        return view('Page.detailsuara',[
            'suara' => DB::table('tbdetailsuara as suara')
            ->join('tbkandidat as kandidat', 'kandidat.nim','=','suara.nim_kandidat')
            ->join('tbpemilih as pemilih', 'pemilih.nim','=','suara.nim_pemilih')
            ->select('kandidat.nama_lengkap as nama_kandidat', 'pemilih.nama_lengkap as nama_pemilih',
            'suara.*')->orderBy('suara.create_at', 'desc')->paginate(10)
        ]);
    }
}
