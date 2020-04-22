<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('fullname');
            $table->string('email')->nullable();
            $table->string('avatar', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('sex', 10)->nullable();
            $table->integer('age')->nullable();
            $table->text('address')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('profile_type', 20);
            $table->string('doc_dept')->nullable();
            $table->integer('security_question')->unsigned()->nullable();
            $table->text('security_answer')->nullable();

            $table->timestamps();
        });

        Schema::table('user_profile', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
