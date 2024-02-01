<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('tel')->nullable();
            $table->string('password');
            $table->string('name');
            $table->integer('pay');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->string('nickname')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->integer('province_id')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('remark')->nullable();
            $table->enum('type', ['Students','Staffs','General'])->nullable();

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
        Schema::dropIfExists('members');
    }
}
