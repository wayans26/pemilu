<?php

namespace App\Login;

use Illuminate\Database\Eloquent\Model;
use Session;

class loginModel extends Model
{
    //
    function isLogin(){
        if(Session::has('login')){
            if(Session::get('login') === True){
                return True;
            }
            else{
                return False;
            }
        }
        else{
            return False;
        }
    }

    function isAdmin(){
        if(Session::has('level')){
            if(Session::get('level') === 'Admin'){
                return True;
            }
            else{
                return False;
            }
        }
        else{
            return False;
        }
    }
    function isRegister(){
        if(Session::has('level')){
            if(Session::get('level') === 'Register'){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
