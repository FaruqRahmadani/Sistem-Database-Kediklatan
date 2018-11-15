<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNipUserIdAttributeToKelompokTanisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('kelompok_tanis', function (Blueprint $table) {
      $table->string('nip')->after('id');
      $table->integer('user_id')->after('foto');
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
      $table->dropColumn('nip');
      $table->dropColumn('user_id');
    });
  }
}
