<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbkandidat;
use App\Login\loginModel;


class kandidatController extends Controller
{
    //
    function index(Request $eq, loginModel $login){
        if($login->isAdmin()){
            return view('Page.daftarkandidat',[
                'kandidat'  => tbkandidat::all()
            ]);
        }
        else{
            abort(404);
        }
    }

    function updateKandidat(Request $req, loginModel $login){
        if($login->isAdmin()){
            $data = $req->all();
            if(tbkandidat::where(['nim' => $data['nim']])->update([
                'nama_lengkap'  => $data['nama'],
                'jurusan'       => $data['jurusan']
            ])){
                return back()->with('status-update-berhasil', 'Update Berhasil');
            }
            else{
                return back()->with('status-update-gagal', 'Update Gagal');
            }
        }
        else{
            abort(404);
        }
    }
}
