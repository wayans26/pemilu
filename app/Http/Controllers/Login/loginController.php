<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Database\tbpemilih;
use Hash;
use DB;

class loginController extends Controller
{
    //
    function index(){
        // tbpemilih::create([
        //     'nim'           => '170010139',
        //     'nama_lengkap'  => 'Wayan Setiawan',
        //     '_password'     => Hash::make('1duatiga'),
        //     'level'         => 'Admin'
        // ]);
    }
}
