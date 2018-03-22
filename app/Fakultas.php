<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'kode_fakultas';
    public $timestamps = false;
}
