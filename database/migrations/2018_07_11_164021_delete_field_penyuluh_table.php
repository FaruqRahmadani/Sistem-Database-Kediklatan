<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFieldPenyuluhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('penyuluhs', function (Blueprint $table) {
        $table->dropColumn('komoditas_unggulan');
        $table->dropColumn('pelatihan');
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
      Schema::table('penyuluhs', function (Blueprint $table) {
        $table->string('komoditas_unggulan')->before('created_at');
        $table->string('pelatihan')->before('created_at');
        $table->string('foto')->before('created_at');
      });
    }
}
