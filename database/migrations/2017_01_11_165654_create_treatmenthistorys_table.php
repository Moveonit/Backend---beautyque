<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmenthistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatmenthistorys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->integer('treatment_id')->unsigned();
            $table->foreign('treatment_id')->references('id')->on('treatments');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('spa_id')->unsigned();
            $table->foreign('spa_id')->references('id')->on('spas');

            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->date('date');

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
        Schema::dropIfExists('treatmenthistorys');
    }
}
