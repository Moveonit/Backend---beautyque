<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatlngToSpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spas', function (Blueprint $table) {
            //
            $table->float('latitude', 10, 8);
            $table->float('longitude', 11, 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spas', function (Blueprint $table) {
            //
            $table->dropColumn("latitude");
            $table->dropColumn("longitude");
        });
    }
}
