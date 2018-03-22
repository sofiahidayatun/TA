<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_matakuliah';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_matakuliah', 1)
                ->get();
}
