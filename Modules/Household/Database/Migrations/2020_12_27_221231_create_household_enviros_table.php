<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdEnvirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_enviros', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('HOUSEHOLD_ENVIR_WLIGHT')->nullable();
            $table->string('HOUSEHOLD_ENVIR_CLEAN')->nullable();
            $table->string('HOUSEHOLD_ENVIR_SAFE')->nullable();
            $table->string('HOUSEHOLD_ENVIR_BIN')->nullable();
            $table->string('HOUSEHOLD_ENVIR_H_ENVI')->nullable();
            $table->string('HOUSEHOLD_ENVIR_H_ENVI_OTHER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_TOXIC')->nullable();
            $table->string('HOUSEHOLD_ENVIR_WATER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_DRINKING')->nullable();
            $table->string('HOUSEHOLD_ENVIR_CONTAINER')->nullable();
            // $table->string('HOUSEHOLD_ENVIR_CONTAINER_OTHER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_COOKING')->nullable();
            $table->string('HOUSEHOLD_ENVIR_WATER_USED')->nullable();
            $table->string('HOUSEHOLD_ENVIR_CONTAINER_USED')->nullable();
            $table->string('HOUSEHOLD_ENVIR_AREA')->nullable();
            $table->string('HOUSEHOLD_ENVIR_ENV_ACT')->nullable();
            $table->string('HOUSEHOLD_ENVIR_ENV_ACT_OTHER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_ELECTRIC')->nullable();
            $table->string('HOUSEHOLD_ENVIR_CONSERV')->nullable();
            $table->string('HOUSEHOLD_ENVIR_CONSERV_OTHER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_DISASTER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_AREA_OCCUP_OTHER')->nullable();
            $table->string('HOUSEHOLD_ENVIR_SOLUTION')->nullable();
            $table->string('HOUSEHOLD_ENVIR_SOLUTION_OTHER')->nullable();

            $table->unsignedBigInteger('household_info_id');
            $table->foreign('household_info_id', 'fk_household_infos_household_enviros')
                ->references('id')
                ->on('household_infos')
                ->onDelete('cascade');

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
        Schema::dropIfExists('household_enviros');
    }
}
