<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletePesertaTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('penyuluhs', function (Blueprint $table) {
      $table->softDeletes();
    });
    Schema::table('kelompok_tanis', function (Blueprint $table) {
      $table->softDeletes();
    });
    Schema::table('p4_s_s', function (Blueprint $table) {
      $table->softDeletes();
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
      $table->dropSoftDeletes();
    });
    Schema::table('kelompok_tanis', function (Blueprint $table) {
      $table->dropSoftDeletes();
    });
    Schema::table('p4_s_s', function (Blueprint $table) {
      $table->softDeletes();
    });
  }
}
