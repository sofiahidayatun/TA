<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArsipSoal extends Model
{
    protected $table = 'arsip_soal';
    protected $primaryKey = 'kode_soal';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_soal', 1)
                ->get();


}
