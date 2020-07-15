<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_user');
            $table->string('tanggal_pelaporan');
            $table->string('nama_pelapor');
            $table->text("isi_laporan");
            $table->string('tanggal_penyelesaian')->nullable();
            $table->string('respons');
            $table->string('status_laporan');
            $table->string('nama_instansi');
            $table->integer('sumber_pelaporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaporans');
    }
}
