<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvinceToSpaGuest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guests', function (Blueprint $table) {
            //
            $table->string('province');
        });
        Schema::table('spas', function (Blueprint $table) {
            //
            $table->string('province');
        });
    }

    /**
     * Reverse the migrations.
     *     * @return void
     */
    public function down()
    {
        Schema::table('guests', function (Blueprint $table) {
            //
            $table->dropColumn('province');
        });
        Schema::table('spas', function (Blueprint $table) {
            //
            $table->dropColumn('province');
        });
    }
}
