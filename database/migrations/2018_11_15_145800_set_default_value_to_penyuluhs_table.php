<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetDefaultValueToPenyuluhsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('penyuluhs', function (Blueprint $table) {
      $table->string('tempat_lahir')->nullable()->change();
      $table->date('tanggal_lahir')->nullable()->change();
      $table->string('agama')->nullable()->change();
      $table->string('jenis_kelamin')->nullable()->change();
      $table->string('status_kawin')->nullable()->change();
      $table->string('pangkat_golongan')->nullable()->change();
      $table->string('jabatan')->nullable()->change();
      $table->string('pendidikan_terakhir')->nullable()->change();
      $table->string('nomor_hp')->nullable()->change();
      $table->integer('satuan_kerja_id')->nullable()->change();
      $table->integer('unit_kerja_id')->nullable()->change();
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
      $table->string('tempat_lahir')->change();
      $table->date('tanggal_lahir')->change();
      $table->string('agama')->change();
      $table->string('jenis_kelamin')->change();
      $table->string('status_kawin')->change();
      $table->string('pangkat_golongan')->change();
      $table->string('jabatan')->change();
      $table->string('pendidikan_terakhir')->change();
      $table->string('nomor_hp')->change();
      $table->integer('satuan_kerja_id')->change();
      $table->integer('unit_kerja_id')->change();
    });
  }
}
