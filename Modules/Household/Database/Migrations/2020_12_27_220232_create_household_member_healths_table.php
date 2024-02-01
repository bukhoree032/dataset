<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdMemberHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_member_healths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_MEMBER_HEALTH_RISK')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_HCARE')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_EMERGENCY')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_CARER_')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_W_CARE')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_W_CARE_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_P_CARE')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_P_CARE_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_ILLNESS')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_BENEFIT')->nullable();
            $table->string('HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE')->nullable();

            $table->unsignedBigInteger('household_members_id');
            $table->foreign('household_members_id', 'fk_household_member_household_member_healths')
                ->references('id')
                ->on('household_members')
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
        Schema::dropIfExists('household_member_healths');
    }
}
