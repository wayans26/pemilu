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
}
