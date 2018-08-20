<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldNameToDaerahTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('provinsis', function (Blueprint $table) {
      $table->renameColumn('nama_provinsi', 'nama');
    });
    Schema::table('kotas', function (Blueprint $table) {
      $table->renameColumn('nama_kota', 'nama');
    });
    Schema::table('kecamatans', function (Blueprint $table) {
      $table->renameColumn('nama_kecamatan', 'nama');
    });
    Schema::table('kelurahans', function (Blueprint $table) {
      $table->renameColumn('nama_kelurahan', 'nama');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('provinsis', function (Blueprint $table) {
      $table->renameColumn('nama', 'nama_provinsi');
    });
    Schema::table('kotas', function (Blueprint $table) {
      $table->renameColumn('nama', 'nama_kota');
    });
    Schema::table('kecamatans', function (Blueprint $table) {
      $table->renameColumn('nama', 'nama_kecamatan');
    });
    Schema::table('kelurahans', function (Blueprint $table) {
      $table->renameColumn('nama', 'nama_kelurahan');
    });
  }
}
