<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbvisimisi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbvisimisi';
    protected $primaryKey = 'id_visimisi';
    protected $fillable = ['nim', 'visi', 'misi'];
}
