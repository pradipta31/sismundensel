<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImunisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imunisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('puskesmas_id')->unsigned();
            $table->integer('pasien_id')->unsigned();
            $table->date('tgl_imunisasi');
            $table->string('jenis_imunisasi');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('puskesmas_id')->references('id')->on('puskesmas');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imunisasis');
    }
}
