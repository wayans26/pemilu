<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbpemilih;
use App\Database\tbdetailsuara;
use Hash;

class registerController extends Controller
{
    //
    function register(loginModel $login, Request $req){
        if($login->isRegister() || $login->isAdmin()){
            try{
                tbpemilih::create([
                    'nim'               => $req->input('nim'),
                    'nama_lengkap'      => $req->input('nama'),
                    'level'             => 'Peserta',
                    'status_register'   => 1,
                    '_password'         => Hash::make('pemiluKMHD2020')
                ]);
                return back()->with('status-tambah-berhasil', 'Data Peserta Berhasil Di tambahkan');
            }catch(\Exception $e){
                return back()->with('status-tambah-gagal', 'Nim Sudah Terdaftar');
            }
        }
        else{
            return redirect('/');
        }
    }
}
