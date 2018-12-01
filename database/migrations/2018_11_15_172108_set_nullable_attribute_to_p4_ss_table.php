<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableAttributeToP4SsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('p4_s_s', function (Blueprint $table) {
      $table->string('nama_ketua')->nullable()->change();
      $table->string('nomor_hp')->nullable()->change();
      $table->text('alamat')->nullable()->change();
      $table->integer('kota_id')->nullable()->change();
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
      $table->string('nama_ketua')->change();
      $table->string('nomor_hp')->change();
      $table->text('alamat')->change();
      $table->integer('kota_id')->change();
    });
  }
}
