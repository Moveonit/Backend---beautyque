<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('VAT_number')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('telephone');
            $table->string('zip_code');
            $table->string('fax')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spas');
    }
}
