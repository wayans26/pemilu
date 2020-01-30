<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbkandidat;
use App\Database\tbtotalsuara;
use App\Database\tbdetailsuara;
use App\Login\loginModel;
use File;


class kandidatController extends Controller
{
    //
    function index(Request $eq, loginModel $login){
        if($login->isAdmin()){
            // dd(tbkandidat::all());
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

    function tambahKandidat(Request $req, loginModel $login){
        if($login->isAdmin()){
            $this->validate($req, [
                'gambar'    => 'image|mimes:jpeg,jpg,png'
            ]);

            $image = $req->file('gambar');
            $path = 'image/kandidat/';

            if($image != NULL){
                $extensi = $image->getClientOriginalExtension();
                if($extensi === 'jpg'){
                    $extensi = '.jpg';
                }
                else if($extensi === 'jpeg'){
                    $extensi = '.jpeg';
                }
                else{
                    $extensi = '.png';
                }

                $name = $req->input('nim'). $extensi;

                if(!File::isDirectory($path)){
                    File::makeDirectory(public_path(). '/'. $path, 0755, true);
                }

                if($image->move($path, $name)){                    
                    tbkandidat::create([
                        'nim'           => $req->input('nim'),
                        'nama_lengkap'  => $req->input('nama'),
                        'jurusan'       => $req->input('jurusan'),
                        'photo'         => $path.$name
                    ]);

                    tbtotalsuara::create([
                        'nim'           => $req->input('nim'),
                        'totalsuara'    => 0
                    ]);

                    return back()->with('status-tambah-berhasil', 'Kandidat Berhasil Di Tambahkan');
                }
                else{
                    return back()->with('status-tambah-gagal', 'Gagal Upload Gambar');
                }

            }
            else{
                return back()->with('status-tambah-gagal', 'Gambar Null');
            }
        }
    }

    function hapusKandidat(Request $req, loginModel $login){
        if($login->isAdmin()){            
            tbtotalsuara::where(['nim' => $req->input('nim')])->delete();
            tbdetailsuara::where(['nim_kandidat' => $req->input('nim')])->delete();
            tbkandidat::where(['nim' => $req->input('nim')])->delete();
            return back()->with('status-hapus-berhasil', 'Kandidat Berhasil Di Hapus Sampai Ke Akar nya');
        }
        else{
            abort(500);
        }
    }
}
