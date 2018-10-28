<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDefaultFotoAttributeToKelompokTanisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('kelompok_tanis', function (Blueprint $table) {
      $table->string('foto')->default('img/kelTani/default.png')->change();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('kelompok_tanis', function (Blueprint $table) {
      $table->string('foto')->default('default.png')->change();
    });
  }
}
