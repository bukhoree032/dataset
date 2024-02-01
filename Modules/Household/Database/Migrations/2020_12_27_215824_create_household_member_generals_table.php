<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdMemberGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_member_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_MEMBER_GENERAL_SKILL')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_NATIONAL_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_LOCAL_OTHER')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_STATUS')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD')->nullable();
            $table->integer('HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID')->nullable();
            $table->text('HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID_OTHER')->nullable();
            $table->string('HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP')->nullable();
            
            $table->unsignedBigInteger('household_members_id');
            $table->foreign('household_members_id', 'fk_household_member_household_member_generals')
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
        Schema::dropIfExists('household_member_generals');
    }
}
