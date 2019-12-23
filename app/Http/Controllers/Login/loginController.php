<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbpemilih;
use App\Login\loginModel;
use App\Database\tbkandidat;
use Hash;
use DB;

class loginController extends Controller
{
    function index(Request $req, loginModel $login){
        // tbpemilih::create([
        //     'nim'           => '180010131',
        //     'nama_lengkap'  => 'Diah Cantiq',
        //     '_password'     => Hash::make('1duatiga'),
        //     'level'         => 'Peserta'
        // ]);        
        if($login->isLogin()){
            return view('Page.index', [
                'kandidat'  => DB::table('tbkandidat as kandidat')
                ->join('tbvisimisi as visimisi','kandidat.nim','=','visimisi.nim')
                ->select('kandidat.*', 'visimisi.visi as visi', 'visimisi.misi as misi')->get()
            ]);
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

    function logout(Request $req){
        $req->session()->flush();
        return redirect('/');
    }
}
