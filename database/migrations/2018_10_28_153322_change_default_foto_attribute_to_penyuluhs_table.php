<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDefaultFotoAttributeToPenyuluhsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('penyuluhs', function (Blueprint $table) {
      $table->string('foto')->default('img/penyuluh/default.png')->change();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('penyuluhs', function (Blueprint $table) {
      $table->string('foto')->default('default.png')->change();
    });
  }
}
