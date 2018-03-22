<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurikulum extends Model
{
    protected $table = 'kurikulum';
    protected $primaryKey = 'kode_kurikulum';
    public $timestamps = true;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    $flights = App\Flight::withTrashed()
                ->where('kode_kurikulum', 1)
                ->get();
}
