<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbstatus extends Model
{
    //
    protected $table = 'tbstatus';
    protected $fillable = ['ip_address', 'status','nim'];
}
