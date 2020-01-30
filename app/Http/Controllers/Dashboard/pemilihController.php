<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login\loginModel;
use App\Database\tbpemilih;
use App\Database\tbdetailsuara;
use Hash;

class pemilihController extends Controller
{
    //
    function index(loginModel $login){
        if($login->isAdmin()){
            return view('Page.pemilih',[
                'pemilih'   => tbpemilih::where('level', '<>', 'Admin')
                ->where('level','<>','Register')->paginate(10),
                'total' => tbpemilih::where('level', '<>', 'Admin')
                ->where('level','<>','Register')->count()
            ]);
        }
        else{
            abort(404);
        }
    }

    function tambahPemilih(loginModel $login, Request $req){
        if($login->isAdmin()){
            try{
                tbpemilih::create([
                    'nim'           => $req->input('nim'),
                    'nama_lengkap'  => $req->input('nama'),
                    'level'         => 'Peserta',
                    '_password'     => Hash::make('pemiluKMHD2020')
                ]);
                return back()->with('status-tambah-berhasil', 'Data Peserta Berhasil Di tambahkan');
            }catch(\Exception $e){
                return back()->with('status-tambah-gagal', 'Nim Sudah Terdaftar');
            }            
        }
        else{
            abort(500);
        }
    }

    function updatePemilih(Request $req, loginModel $login){
        if($login->isAdmin()){
            if(tbpemilih::where(['nim' => $req->input('nim')])->update(['nama_lengkap' => $req->input('nama')])){
                return back()->with('status-update-berhasil', 'Data Peserta Berhasil Di Update');
            }
            else{
                return back()->with('status-update-berhasil', 'Data Peserta Gagal Di Update');
            }
        }
        else{
            abort(500);
        }
    }

    function hapusPemilih(Request $req, loginModel $login){
        if($login->isAdmin()){
            tbdetailsuara::where(['nim_pemilih' => $req->input('nim')])->delete();
            try{
                tbpemilih::where(['nim' => $req->input('nim')])->delete();
                return back()->with('status-hapus-berhasil', 'Data Peserta Berhasil Di Hapus');
            }catch(\Exception $e){
                return back()->with('status-hapus-gagal', 'Data Peserta Gagal Di Hapus');
            }
        } 
        else{
            abort(500);
        }
    }

    function activePemilih(Request $req, loginModel $login){
        if($login->isAdmin()){
            if(tbpemilih::where(['nim' => $req->input('nim')])->update(['status_register' => 1])){
                return back()->with('status-active-berhasil', 'Registrasi Ulang Berhasil');
            }
            else{
                return back()->with('status-active-gagal', 'Registrasi Ulang Gagal');
            }
        }
        else{
            abort(500);
        }
    }
}
