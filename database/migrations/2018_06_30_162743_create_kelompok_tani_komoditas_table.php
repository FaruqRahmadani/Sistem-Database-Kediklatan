<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelompokTaniKomoditasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('kelompok_tani_komoditas', function (Blueprint $table) {
      $table->integer('kelompok_tani_id')->unsigned();
      $table->integer('komoditas_id')->unsigned();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('kelompok_tani_komoditas');
  }
}
