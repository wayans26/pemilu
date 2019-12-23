<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbdetailsuara extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbdetailsuara';
    protected $primaryKey = 'id_detailsuara';
    protected $fillable = ['nim_kandidat', 'nim_pemilih'];
}
