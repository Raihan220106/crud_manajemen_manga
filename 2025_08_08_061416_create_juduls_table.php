<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    Schema::table('juduls', function (Blueprint $table) {
        $table->unsignedBigInteger('penerbit_id')->after('nama_judul');

        $table->foreign('penerbit_id')
              ->references('id')
              ->on('penerbits')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('juduls', function (Blueprint $table) {
        $table->dropForeign(['penerbit_id']);
        $table->dropColumn('penerbit_id');
    });
}

};
