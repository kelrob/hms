<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecurityQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_question', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('question_name');
            $table->timestamps();
        });

        DB::connection('mysql')->table('security_question')->insert([
            /** Available Roles */
            [
                'question_name' => 'What was your childhood nickname?',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question_name' => 'In what city does your nearest Sibling Lives?',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'question_name' => 'In what city or town was your first job?',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_question');
    }
}
