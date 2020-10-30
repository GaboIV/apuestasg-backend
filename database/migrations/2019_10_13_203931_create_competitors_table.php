<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('data')->nullable();
            $table->integer('HT')->nullable();
            $table->string('provider')->default('apuestasg.com');
            $table->boolean('status')->default(0);
            $table->text('winner')->nullable();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')
                ->references('id')
                ->on('games');
            $table->unsignedBigInteger('bet_type_id');
            $table->foreign('bet_type_id')
                ->references('id')
                ->on('bet_types');
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
        Schema::dropIfExists('competitors');
    }
}
