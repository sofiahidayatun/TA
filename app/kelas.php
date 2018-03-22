<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_kelas', 1)
                ->get();
}
