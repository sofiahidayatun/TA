<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'kode_tahun_ajaran';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_tahun_ajaran', 1)
                ->get();
}
