<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKotaKomoditasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('kota_komoditas', function (Blueprint $table) {
      $table->integer('kota_id')->unsigned();
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
    Schema::dropIfExists('kota_komoditas');
  }
}
