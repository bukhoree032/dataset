<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('H_ID')->nullable();
            $table->string('H_NAME')->nullable();
            $table->string('H_HOUSE_NUMBER')->nullable();
            $table->string('H_VILLAGE');
            $table->string('H_MOO')->nullable();
            $table->string('H_PROVINCE')->nullable();
            $table->string('H_AMPHURE')->nullable();
            $table->string('H_DISTRICT')->nullable();
            $table->string('H_TEL')->nullable();
            $table->string('H_YEAR')->nullable();
            $table->string('H_ACTIVITY')->nullable();

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
        Schema::dropIfExists('household');
    }
}
