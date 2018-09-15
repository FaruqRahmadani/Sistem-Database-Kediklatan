<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAlamatFieldToSatuanKerjaTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('satuan_kerjas', function (Blueprint $table) {
      $table->text('alamat')->change();
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
      $table->string('alamat')->change();
    });
  }
}
