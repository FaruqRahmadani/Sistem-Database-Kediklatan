<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateP4STable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('p4_s_s', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama');
      $table->string('nama_ketua');
      $table->string('nomor_hp');
      $table->text('alamat');
      $table->integer('kota_id');
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
    Schema::dropIfExists('p4_s_s');
  }
}
