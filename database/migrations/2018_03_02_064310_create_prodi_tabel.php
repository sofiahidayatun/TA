<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdiTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->char('kode_prodi');
            $table->primary('kode_prodi');
            $table->string('prodi');
            $table->char('kode_fakultas');
            $table->char('nidn'); 
            $table->timestamps();
            $table->foreign('kode_fakultas')->references('kode_fakultas')->on('fakultas');
            $table->foreign('nidn')->references('nidn')->on('dosen');
        });
        // Schema::table('fakultas', function($table){
        //     $table->foreign('kode_fakultas');
        //     $table->references('kode_fakultas');
        //     $table->on('fakultas');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('dosen', function($table){
        //     $table->foreign('nidn');
        //     $table->references('nidn');
        //     $table->on('dosen');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('prodi', function ($table) {
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
         Schema::dropIfExists('prodi');
    }
}
