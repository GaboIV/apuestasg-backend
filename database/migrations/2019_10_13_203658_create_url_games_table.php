<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('guide');
            $table->string('url');
            $table->unsignedBigInteger('bet_type_id');
            $table->foreign('bet_type_id')
                ->references('id')
                ->on('bet_types');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')
                ->references('id')
                ->on('games');
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
        Schema::dropIfExists('url_games');
    }
}
