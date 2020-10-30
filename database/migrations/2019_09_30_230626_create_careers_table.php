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
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->text('title')->nullable();
            $table->unsignedBigInteger('racecourse_id');
            $table->foreign('racecourse_id')
                ->references('id')
                ->on('racecourses');
            $table->date('date');
            $table->datetime('posttime');
            $table->integer('distance')->nullable();
            $table->integer('number');
            $table->integer('valid')->nullable();
            $table->integer('surface')->nullable();
            $table->decimal('purse', 15, 2)->nullable();
            $table->string('grade', 20)->nullable();
            $table->string('age_restriction', 20)->nullable();
            $table->string('sex_restriction', 20)->nullable();
            $table->string('record', 20)->nullable();
            $table->tinyInteger('status')->nullable();
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
