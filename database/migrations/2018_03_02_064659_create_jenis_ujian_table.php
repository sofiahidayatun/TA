<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_ujian', function (Blueprint $table) {
            $table->char('kode_jenis_ujian');
            $table->primary('kode_jenis_ujian');
            $table->string('jenis_ujian');
            $table->timestamps();
            
        });
        // Schema::table('jenis_ujian', function ($table) {
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
        Schema::dropIfExists('jenis_ujian');
    }
}
