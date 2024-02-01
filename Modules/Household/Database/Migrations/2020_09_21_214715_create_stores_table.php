<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('STORE_DATE')->nullable();
            $table->time('STORE_TIME')->nullable();
            $table->time('STORE_TO_TIME')->nullable();
            $table->integer('STORE_FORM_ROUND');
            $table->string('STORE_FORM_NUMBER')->nullable();
            $table->string('STORE_COLLECTOR')->nullable();
            $table->string('STORE_CHECK')->nullable();
            $table->string('STORE_SAVE')->nullable();
            $table->string('STORE_PERSON')->nullable();

            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id', 'fk_members_stores')
                ->references('id')
                ->on('members');

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
        Schema::dropIfExists('stores');
    }
}
