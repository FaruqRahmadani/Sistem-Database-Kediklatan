<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelatihanPenyuluhsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pelatihan_penyuluhs', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('pelatihan_id');
      $table->integer('penyuluh_id');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('pelatihan_penyuluhs');
  }
}
