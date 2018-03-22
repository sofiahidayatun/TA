<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisUjian extends Model
{
    protected $table = 'jenis_ujian';
    protected $primaryKey = 'kode_jenis_ujian';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_jenis_ujian', 1)
                ->get();
}
