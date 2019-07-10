<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('puskesmas_id')->unsigned();
            $table->string('nama_pasien');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jk_pasien',1);
            $table->string('nama_ortu');
            $table->string('umur');
            $table->text('alamat');
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
        Schema::dropIfExists('pasiens');
    }
}
