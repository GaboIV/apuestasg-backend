<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_id');
            $table->datetime('start');
            $table->date('avaible');
            $table->string('url');
            $table->string('guide');
            $table->boolean('outstanding');
            $table->string('importance');
            $table->string('live_id');
            $table->boolean('status_live_id');
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')
                ->references('id')
                ->on('leagues');
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
        Schema::dropIfExists('games');
    }
}
