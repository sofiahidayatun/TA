<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'nip';
    public $timestamps = true;
}
