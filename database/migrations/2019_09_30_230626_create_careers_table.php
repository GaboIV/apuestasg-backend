<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('title');
            $table->unsignedBigInteger('racecourse_id');
            $table->foreign('racecourse_id')
                ->references('id')
                ->on('racecourses');
            $table->date('date');
            $table->integer('distance');
            $table->integer('number');
            $table->integer('valid');
            $table->integer('surface');
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
        Schema::dropIfExists('careers');
    }
}
