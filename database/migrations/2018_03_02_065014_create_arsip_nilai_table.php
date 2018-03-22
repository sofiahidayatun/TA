<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('arsip_nilai', function (Blueprint $table) {
            $table->char('kode_nilai');
            $table->primary('kode_nilai');
            $table->char('kode_kurikulum');
            $table->char('kode_jenis_ujian');
            $table->char('kode_matakuliah');
            $table->char('nidn');
            $table->date('kode_fakultas');
            $table->char('kode_prodi');
            $table->string('soal');
            $table->timestamps();
            $table->foreign('kode_kurikulum')->references('kode_kurikulum')->on('kurikulum');
            $table->foreign('kode_jenis_ujian')->references('kode_jenis_ujian')->on('jenis_ujian');
            $table->foreign('kode_matakuliah')->references('kode_matakuliah')->on('matakuliah');
            $table->foreign('nidn')->references('nidn')->on('dosen');
            $table->foreign('kode_fakultas')->references('kode_fakultas')->on('fakultas');
            $table->foreign('kode_prodi')->references('kode_prodi')->on('prodi');
        });
        // Schema::table('kurikulum', function($table){
        //     $table->foreign('kode_kurikulum');
        //     $table->references('kode_kurikulum');
        //     $table->on('kurikulum');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('jenis_ujian', function($table){
        //     $table->foreign('kode_jenis_ujian');
        //     $table->references('kode_jenis_ujian');
        //     $table->on('jenis_ujian');
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
        // Schema::table('fakultas', function($table){
        //     $table->foreign('kode_fakultas');
        //     $table->references('kode_fakultas');
        //     $table->on('fakultas');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('prodi', function($table){
        //     $table->foreign('kode_prodi');
        //     $table->references('kode_prodi');
        //     $table->on('prodi');
        //     $table->onUpdate('cascade');
        //     $table->onDelete('cascade');
        // });
        // Schema::table('arsip_nilai', function ($table) {
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
        Schema::dropIfExists('arsip_nilai');
    }
}
