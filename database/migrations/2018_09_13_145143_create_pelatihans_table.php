<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelatihansTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pelatihans', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->date('tanggal');
      $table->string('keterangan');
      $table->tinyInteger('tipe');
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
    Schema::dropIfExists('pelatihans');
  }
}
