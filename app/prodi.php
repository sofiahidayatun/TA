<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class prodi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'kode_prodi';
    public $timestamps = true;
   
   	use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_prodi', 1)
                ->get();
}
