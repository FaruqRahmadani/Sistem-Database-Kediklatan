<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDefaultFotoAttributeToP4SsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('p4_s_s', function (Blueprint $table) {
      $table->string('foto')->default('img/P4S/default.png')->change();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('p4_s_s', function (Blueprint $table) {
      $table->string('foto')->default('default.png')->change();
    });
  }
}
