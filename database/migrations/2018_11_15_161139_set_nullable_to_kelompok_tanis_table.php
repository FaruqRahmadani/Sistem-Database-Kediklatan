<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableToKelompokTanisTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('kelompok_tanis', function (Blueprint $table) {
      $table->string('nama_ketua')->nullable()->change();
      $table->string('nomor_hp')->nullable()->change();
      $table->string('alamat')->nullable()->change();
      $table->integer('kota_id')->nullable()->change();
      $table->integer('penyuluh_id')->nullable()->change();
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
      $table->string('nama_ketua')->change();
      $table->string('nomor_hp')->change();
      $table->string('alamat')->change();
      $table->integer('kota_id')->change();
      $table->integer('penyuluh_id')->change();
    });
  }
}
