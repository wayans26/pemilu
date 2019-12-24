<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class tbtotalsuara extends Model
{
    //
    // public $timestamps = false;
    protected $table = 'tbtotalsuara';
    protected $foreignKey = 'nim';
    protected $fillable = ['nim', 'totalsuara'];
}
