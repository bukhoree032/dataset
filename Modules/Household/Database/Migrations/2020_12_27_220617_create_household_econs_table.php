<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdEconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_econs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('HOUSEHOLD_ECON_GENERAL')->nullable();
            $table->string('HOUSEHOLD_ECON_AGRI')->nullable();
            $table->string('HOUSEHOLD_ECON_LIVESTOCK')->nullable();
            $table->string('HOUSEHOLD_ECON_FISHING')->nullable();
            $table->string('HOUSEHOLD_ECON_OCCU_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_CHILD')->nullable();
            $table->string('HOUSEHOLD_ECON_WELFARE')->nullable();
            $table->string('HOUSEHOLD_ECON_OTHER_REVENUE')->nullable();
            $table->string('HOUSEHOLD_ECON_NOTE_REVENUE')->nullable();

            $table->string('HOUSEHOLD_ECON_FOOD')->nullable();
            $table->string('HOUSEHOLD_ECON_WATER')->nullable();
            $table->string('HOUSEHOLD_ECON_ELECTRICITY')->nullable();
            $table->string('HOUSEHOLD_ECON_TEL')->nullable();
            $table->string('HOUSEHOLD_ECON_INTERNET')->nullable();
            $table->string('HOUSEHOLD_ECON_STUDY')->nullable();
            $table->string('HOUSEHOLD_ECON_NURSE')->nullable();
            $table->string('HOUSEHOLD_ECON_INSURANCE')->nullable();
            $table->string('HOUSEHOLD_ECON_SOCIETY')->nullable();
            $table->string('HOUSEHOLD_ECON_TRAVEL')->nullable();
            $table->string('HOUSEHOLD_ECON_RISK')->nullable();
            $table->string('HOUSEHOLD_ECON_ALCOHOL')->nullable();
            $table->string('HOUSEHOLD_ECON_DEBT')->nullable();
            $table->string('HOUSEHOLD_ECON_OTHER_EXPENSES')->nullable();
            $table->string('HOUSEHOLD_ECON_NOTE_EXPENSES')->nullable();


            $table->string('HOUSEHOLD_ECON_HOUSE_LIST')->nullable();
            $table->string('HOUSEHOLD_ECON_HOUSE_NO')->nullable();
            $table->string('HOUSEHOLD_ECON_LAND')->nullable();
            $table->string('HOUSEHOLD_ECON_LAND_SIZE')->nullable();
            $table->string('HOUSEHOLD_ECON_AREA_LIST')->nullable();
            $table->string('HOUSEHOLD_ECON_AREA_NO')->nullable();
            $table->string('HOUSEHOLD_ECON_EQUIPMENT_TYPE')->nullable();
            $table->string('HOUSEHOLD_ECON_EQUIPMENT_NUM')->nullable();
            $table->string('HOUSEHOLD_ECON_VEHICLE_NUM')->nullable();
            $table->string('HOUSEHOLD_ECON_VEHICLE_TYPE')->nullable();
            $table->string('HOUSEHOLD_ECON_COM_DEVICE_TYPE')->nullable();
            $table->string('HOUSEHOLD_ECON_COM_DEVICE_NUM')->nullable();
            $table->string('HOUSEHOLD_ECON_PET_NUM')->nullable();
            $table->string('HOUSEHOLD_ECON_PET_CATEG')->nullable();
            $table->string('HOUSEHOLD_DEPT_AMOUNT')->nullable();
            $table->string('HOUSEHOLD_ECON_DEPT_FROM_TYPE')->nullable();
            $table->string('HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_SPECIAL_FIN_')->nullable();
            $table->string('HOUSEHOLD_ECON_COMM_BANK_')->nullable();
            $table->string('HOUSEHOLD_ECON_COMM_BANK_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_NONBANK_')->nullable();
            $table->string('HOUSEHOLD_ECON_NONBANK_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_COMMU_FUND_')->nullable();
            $table->string('HOUSEHOLD_ECON_COMMU_FUND_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_SHARK_LOAN_')->nullable();
            $table->string('HOUSEHOLD_ECON_H_SAVING_')->nullable();
            $table->string('HOUSEHOLD_ECON_H_SAVING_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_OCCUP_PROBLEM_')->nullable();
            $table->string('HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER')->nullable();
            $table->string('HOUSEHOLD_ECON_LIVING_PROBLEM_')->nullable();
            $table->string('HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER')->nullable();

            $table->unsignedBigInteger('household_info_id');
            $table->foreign('household_info_id', 'fk_household_infos_household_econs')
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
        Schema::dropIfExists('household_econs');
    }
}
