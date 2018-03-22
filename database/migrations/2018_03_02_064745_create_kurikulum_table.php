<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKurikulumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->char('kode_kurikulum');
            $table->primary('kode_kurikulum');
            $table->char('kode_fakultas');
            $table->char('kode_matakuliah');
            $table->char('nidn');
            $table->char('kode_thn_ajaran');
            $table->char('kode_kelas');
            $table->timestamps();
            $table->foreign('kode_fakultas')->references('kode_fakultas')->on('fakultas');
            $table->foreign('kode_matakuliah')->references('kode_matakuliah')->on('matakuliah');
            $table->foreign('nidn')->references('nidn')->on('dosen');
            $table->foreign('kode_thn_ajaran')->references('kode_thn_ajaran')->on('thn_ajaran');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas');
        });
        // Schema::table('fakultas', function($table){
        //     $table->foreign('kode_fakultas');
        //     $table->references('kode_fakultas');
        //     $table->on('fakultas');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('matakuliah', function($table){
        //     $table->foreign('kode_matakuliah');
        //     $table->references('kode_matakuliah');
        //     $table->on('matakuliah');
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
        // Schema::table('thn_ajaran', function($table){
        //     $table->foreign('kode_thn_ajaran');
        //     $table->references('kode_thn_ajaran');
        //     $table->on('thn_ajaran');
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
        // Schema::table('kurikulum', function ($table) {
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
        Schema::dropIfExists('kurikulum');
    }
}
