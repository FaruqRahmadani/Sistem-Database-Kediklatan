<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelompokTanisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('kelompok_tanis', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->string('nama_ketua');
      $table->string('nomor_hp');
      $table->string('alamat');
      $table->integer('provinsi_id');
      $table->integer('kota_id');
      $table->integer('komoditas_id')->default(0);
      $table->string('foto')->default('default.png');
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
    Schema::dropIfExists('kelompok_tanis');
  }
}
