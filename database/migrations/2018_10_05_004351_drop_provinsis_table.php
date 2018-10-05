<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropProvinsisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::dropIfExists('provinsis');
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::create('provinsis', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama_provinsi');
      $table->timestamps();
    });
  }
}
