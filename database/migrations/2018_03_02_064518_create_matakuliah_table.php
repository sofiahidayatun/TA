<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->char('kode_matakuliah');
            $table->primary('kode_matakuliah');
            $table->string('matakuliah');
            $table->string('sks');
            $table->string('semester');
            $table->char('kode_prodi');
            $table->char('kode_fakultas');
            $table->char('nidn');
            $table->char('kode_kelas');
            $table->timestamps();
            $table->foreign('kode_prodi')->references('kode_prodi')->on('prodi');
            $table->foreign('kode_fakultas')->references('kode_fakultas')->on('fakultas');
            $table->foreign('nidn')->references('nidn')->on('dosen');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas');
        });
        // Schema::table('prodi', function($table){
        //     $table->foreign('kode_prodi');
        //     $table->references('kode_prodi');
        //     $table->on('prodi');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
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
        // Schema::table('kelas', function($table){
        //     $table->foreign('kode_kelas');
        //     $table->references('kode_kelas');
        //     $table->on('kelas');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('matakuliah', function ($table) {
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
        Schema::dropIfExists('matakuliah');
    }
}
