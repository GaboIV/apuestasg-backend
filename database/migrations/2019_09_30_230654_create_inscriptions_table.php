<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('horse_id');
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')
                ->references('id')
                ->on('careers');
            $table->foreign('horse_id')
                ->references('id')
                ->on('horses');
            $table->unsignedBigInteger('jockey_id');
            $table->foreign('jockey_id')
                ->references('id')
                ->on('jockeys');
            $table->unsignedBigInteger('trainer_id');
            $table->foreign('trainer_id')
                ->references('id')
                ->on('trainers');
            $table->unsignedBigInteger('stud_id');
            $table->foreign('stud_id')
                ->references('id')
                ->on('studs');
            $table->unsignedBigInteger('stud2_id');
            $table->foreign('stud2_id')
                ->references('id')
                ->on('studs');
            $table->decimal('weight');
            $table->string('medicines');
            $table->string('implements');
            $table->string('number');
            $table->string('position');
            $table->boolean('status');
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
        Schema::dropIfExists('inscriptions');
    }
}
