<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyuluhsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('penyuluhs', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nip');
      $table->string('nama');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');
      $table->string('agama');
      $table->string('jenis_kelamin');
      $table->string('status_kawin');
      $table->string('pangkat_golongan');
      $table->string('jabatan');
      $table->string('pendidikan_terakhir');
      $table->string('nomor_hp');
      $table->integer('satuan_kerja_id');
      $table->integer('unit_kerja_id');
      $table->string('komoditas_unggulan');
      $table->string('pelatihan');
      $table->string('foto')->default('default.png');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('penyuluhs');
  }
}
