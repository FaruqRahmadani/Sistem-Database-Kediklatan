<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropProvinsiIdToSatuanKerjasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('satuan_kerjas', function (Blueprint $table) {
      $table->dropColumn('provinsi_id');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('satuan_kerjas', function (Blueprint $table) {
      $table->integer('provinsi_id')->before('kota_id');
    });
  }
}
