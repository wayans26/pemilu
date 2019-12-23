<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbtotalsuara extends Model
{
    //
    // public $timestamps = false;
    protected $table = 'tbtotalsuara';
    protected $primaryKey = 'id_totalsuara';
    protected $fillable = ['nim', 'totalsuara'];
}
