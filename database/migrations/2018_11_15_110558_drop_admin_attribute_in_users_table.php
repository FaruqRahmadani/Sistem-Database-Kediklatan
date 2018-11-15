<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAdminAttributeInUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropColumn('nama');
      $table->dropColumn('foto');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('nama');
      $table->string('foto')->after('remember_token')->default('default.png');
    });
  }
}
