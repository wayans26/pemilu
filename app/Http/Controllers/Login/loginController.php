<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbpemilih;
use App\Login\loginModel;
use App\Database\tbkandidat;
use App\Database\tbstatus;
use Hash;
use DB;

class loginController extends Controller
{
    function index(Request $req, loginModel $login){
        // admin
        // ur   : 170010139
        // pass : 1duatiga
        // register
        // ur  : blinkit
        // pass : 1duatiga
        // tbpemilih::create([
        //     'nim'           => 'blinkit',
        //     'nama_lengkap'  => 'Wayan Setiawan',
        //     '_password'     => Hash::make('1duatiga'),
        //     'level'         => 'Register'
        // ]);        
        if($login->isLogin()){
            if($login->isRegister()){
                return view('Page.register');
            }
            if($login->isAdmin()){
                return redirect('/status');
            }
            else{
                return view('Page.index', [
                    'kandidat'  => DB::table('tbkandidat as kandidat')
                    ->join('tbvisimisi as visimisi','kandidat.nim','=','visimisi.nim')
                    ->select('kandidat.*', 'visimisi.visi as visi', 'visimisi.misi as misi')->get()
                ]);
            }
        }
        else{
            return view('Login.formLogin');
        }

    }

    function prosesLogin(Request $req){
        $data = $req->all();
        $user = tbpemilih::where(['nim' => $data['nim']])->get();
        if(sizeof($user) > 0){
            foreach($user as $item){
                if($item->status_memilih !== 1 && $item->status_register === 1){
                    if(Hash::check($data['password'], $item->_password)){
                        tbstatus::create([
                            'nim'           => $item->nim,
                            'ip_address'    => $_SERVER['REMOTE_ADDR'],
                            'status'        => 'online'
                        ]);
                        $req->session()->put([
                            'login' => True,
                            'nim'   => $item->nim,
                            'nama'  => $item->nama_lengkap,
                            'level' => $item->level                 
                        ]);
                        return back();
                    }
                    else{
                        return back()->with('status', 'Nim Atau Password Salah');
                    }
                    
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

    function logout(Request $req){
        tbstatus::where([
            'nim'    => $req->session()->get('nim')
        ])->update([
            'status'        => 'offline'
        ]);
        $req->session()->flush();
        return redirect('/');
    }
}
