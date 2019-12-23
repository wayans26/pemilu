<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbkandidat;
use App\Database\tbvisimisi;

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
    }
}
