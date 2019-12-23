<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbkandidat;
use App\Database\tbvisimisi;
use App\Database\tbtotalsuara;
use App\Database\tbdetailsuara;
use App\Database\tbstatus;
use App\Login\loginModel;
use App\Database\tbpemilih;
use DB;

class dashboardController extends Controller
{
    //
    function example(Request $req){
        // tbkandidat::create([
        //     'nim'           => '170010122',
        //     'nama_lengkap'  => 'Santi ekekek Calon',
        //     'jurusan'       => 'Sistem Informasi',
        //     'photo'         => 'asset/img/anime3.png'
        // ]);  
        // tbvisimisi::create([
        //     'nim'   => '170010122',
        //     'visi'  => 'Ini Visi Shanti',
        //     'misi'  => 'Ini Misi Shanti'
        // ]);     
        // $kandidat = tbkandidat::all();
        // return $kandidat;

        // $result =  tbtotalsuara::create([
        //     'nim'           => '170010122',
        //     'totalsuara'    => 0
        // ]);

        // $result = tbtotalsuara::where('nim', '170010120')->increment('totalsuara', 1);
        // return $result;
    }

    function vote(Request $req, loginModel $login){
        if($login->isLogin()){
            tbdetailsuara::create([
                'nim_kandidat'  => $req->input('nim'),
                'nim_pemilih'   => $req->session()->get('nim')  
            ]);

            if(tbtotalsuara::where(['nim' => $req->input('nim')])->increment('totalsuara',1)){   
                tbpemilih::where(['nim' => $req->session()->get('nim')])->update([
                    'status_memilih'    => 1
                ]);  
                tbstatus::where([
                    'ip_address'    => $_SERVER['REMOTE_ADDR']
                ])->update([
                    'status'        => 'offline'
                ]);    
                $req->session()->flush();
                return redirect('/');
            }
        }
        else{
            abort(500);
        }
    }
}
