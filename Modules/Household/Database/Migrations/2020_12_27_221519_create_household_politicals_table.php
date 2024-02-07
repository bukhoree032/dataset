<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdPoliticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_politicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_POLITICAL_COM_ELEC')->nullable();
            $table->string('HOUSEHOLD_POLITICAL_COM_ELEC_NUM')->nullable();
            $table->string('HOUSEHOLD_POLITICAL_COM_ELEC_OTHER')->nullable();

            $table->unsignedBigInteger('household_info_id');
            $table->foreign('household_info_id', 'fk_household_infos_household_politicals')
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
        Schema::dropIfExists('household_politicals');
    }
}
