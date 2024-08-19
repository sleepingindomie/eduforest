<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('matakuliah');
            $table->integer('sks');
            $table->string('dosen');
            $table->string('hari');
            $table->string('pukul');
            $table->string('kelas');
            $table->string('ruang');
            $table->string('jurusan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
