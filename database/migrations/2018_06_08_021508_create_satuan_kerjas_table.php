<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSatuanKerjasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('satuan_kerjas', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->string('alamat');
      $table->string('nomor_telepon');
      $table->integer('provinsi_id');
      $table->integer('kota_id');
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
    Schema::dropIfExists('satuan_kerjas');
  }
}
