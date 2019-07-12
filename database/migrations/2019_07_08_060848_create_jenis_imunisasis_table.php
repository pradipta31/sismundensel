<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisImunisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_imunisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasien_id')->unsigned();
            $table->integer('hepatitis_b_0')->nullable();
            $table->integer('polio_1')->nullable();
            $table->integer('polio_2')->nullable();
            $table->integer('polio_3')->nullable();
            $table->integer('polio_4')->nullable();
            $table->integer('ipv')->nullable();
            $table->integer('bcg')->nullable();
            $table->integer('dpthb_1')->nullable();
            $table->integer('dpthb_2')->nullable();
            $table->integer('dpthb_3')->nullable();
            $table->integer('campak_rubela')->nullable();
            $table->integer('je')->nullable();
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
        Schema::dropIfExists('jenis_imunisasis');
    }
}
