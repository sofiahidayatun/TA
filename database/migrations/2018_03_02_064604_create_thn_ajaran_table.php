<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThnAjaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thn_ajaran', function (Blueprint $table) {
            $table->char('kode_thn_ajaran');
            $table->primary('kode_thn_ajaran');
            $table->string('tahun');
            $table->string('semester');
            $table->timestamps();
            
        });
        // Schema::table('thn_ajaran', function ($table) {
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thn_ajaran');
    }
}
