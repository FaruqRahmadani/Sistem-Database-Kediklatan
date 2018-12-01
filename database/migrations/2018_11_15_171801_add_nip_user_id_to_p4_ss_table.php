<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNipUserIdToP4SsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('p4_s_s', function (Blueprint $table) {
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
    Schema::table('p4_s_s', function (Blueprint $table) {
      $table->dropColumn('nip');
      $table->dropColumn('user_id');
    });
  }
}
