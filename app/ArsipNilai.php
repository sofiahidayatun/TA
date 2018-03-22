<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArsipNilai extends Model
{
    protected $table = 'arsip_niai';
    protected $primaryKey = 'kode_niai';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_nilai', 1)
                ->get();

}
