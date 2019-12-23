<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbpemilih;
use App\Login\loginModel;
use Hash;
use DB;

class loginController extends Controller
{
    //

    // function __construct(loginModel $login){
    //     if($login->isLogin()){

    //     }
    // }
    function index(Request $req, loginModel $login){
        // tbpemilih::create([
        //     'nim'           => '170010139',
        //     'nama_lengkap'  => 'Wayan Setiawan',
        //     '_password'     => Hash::make('1duatiga'),
        //     'level'         => 'Admin'
        // ]);        
        if($login->isLogin()){
            return "Login";
        }
        else{
            return view('Login.formLogin');
        }

    }

    function prosesLogin(Request $req){
        $data = $req->all();
        // dd($data);
        $user = tbpemilih::where(['nim' => $data['nim']])->get();
        if(sizeof($user) > 0){
            foreach($user as $item){
                if($item->status_memilih !== 1 && $item->status_register === 1){
                    $req->session()->put([
                        'login' => True,
                        'nim'   => $item->nim,
                        'nama'  => $item->nama_lengkap,
                        'level' => $item->level                 
                    ]);
                    return back();
                }
                else{
                    if($item->status_memilih === 1){
                        return back()->with('status', 'Anda Sudah Memilih');
                    }
                    else{
                        return back()->with('status', 'Anda Belum Terdaftar');
                    }
                }
            }            
        }
        else{
            return back()->with('status', 'Nim Atau Password Salah');
        }
    }
}
