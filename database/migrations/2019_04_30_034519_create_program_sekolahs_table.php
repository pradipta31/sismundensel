<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_sekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('puskesmas_id')->unsigned();
            $table->string('nama_sekolah');
            $table->date('tanggal_imunisasi');
            $table->string('jumlah_siswa');
            $table->string('jumlah_imunisasi');
            $table->string('jenis_imunisasi');
            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('puskesmas_id')->references('id')->on('puskesmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_sekolahs');
    }
}
