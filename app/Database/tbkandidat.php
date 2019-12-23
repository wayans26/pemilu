<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbkandidat extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbkandidat';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim', 'nama_lengkap', 'jurusan','photo'];
}
