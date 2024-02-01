<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_infos', function (Blueprint $table) {
//            $table->engine = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_INFO_PROVINCE')->nullable();
            $table->string('HOUSEHOLD_INFO_AMPHURE')->nullable();
            $table->string('HOUSEHOLD_INFO_DISTRICT')->nullable();
            $table->string('HOUSEHOLD_INFO_MOO')->nullable();
            $table->string('HOUSEHOLD_INFO_VIL_NAME')->nullable();
            $table->string('HOUSEHOLD_INFO_COMMU_NAME')->nullable();
            $table->text('HOUSEHOLD_INFO_ADDRESS')->nullable();
            $table->string('HOUSEHOLD_INFO_HOUSE_CODE')->nullable();
            $table->string('HOUSEHOLD_INFO_HOUSE_NEAR')->nullable();
            $table->string('HOUSEHOLD_INFO_SOI')->nullable();
            $table->string('HOUSEHOLD_INFO_ROAD')->nullable();
            $table->string('HOUSEHOLD_INFO_LOCAL_LAT')->nullable();
            $table->string('HOUSEHOLD_INFO_LOCAL_LONG')->nullable();

            $table->unsignedBigInteger('store_id');
            $table->foreign('store_id', 'fk_stores_household_infos')
                ->references('id')
                ->on('stores')
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
        Schema::dropIfExists('households');
    }
}
