<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_MEMBER_PNAME')->nullable();
            $table->string('HOUSEHOLD_MEMBER_NAME')->nullable();
            $table->string('HOUSEHOLD_MEMBER_SURNAME')->nullable();
            $table->string('HOUSEHOLD_MEMBER_AGE')->nullable();
            $table->string('HOUSEHOLD_MEMBER_SEX')->nullable();
            $table->string('HOUSEHOLD_MEMBER_DOB')->nullable();
            $table->string('HOUSEHOLD_MEMBER_CITIZENNUMBER')->nullable();
            // $table->integer('HOUSEHOLD_MEMBER_WEIGHT')->nullable();
            // $table->string('HOUSEHOLD_MEMBER_NATIONALITY')->nullable();
            // $table->string('HOUSEHOLD_MEMBER_RELIGION')->nullable();

            $table->unsignedBigInteger('household_info_id');
            $table->foreign('household_info_id', 'fk_household_infos_household_members')
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
        Schema::dropIfExists('household_members');
    }
}
