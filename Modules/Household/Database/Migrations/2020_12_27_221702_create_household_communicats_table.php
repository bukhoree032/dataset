<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdCommunicatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_communicats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_COMUNICAT_OCCUP')->nullable();
            $table->string('HOUSEHOLD_COMUNICAT_STUDY')->nullable();
            $table->string('HOUSEHOLD_COMUNICAT_SOCIETY')->nullable();
            $table->string('HOUSEHOLD_COMUNICAT_OTHER')->nullable();

            $table->unsignedBigInteger('household_info_id');
            $table->foreign('household_info_id', 'fk_household_infos_household_communicats')
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
        Schema::dropIfExists('household_communicats');
    }
}
