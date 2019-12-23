<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbpemilih extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbpemilih';
    protected $fillable = ['nim', 'nama_lengkap', '_password','level'];
}
