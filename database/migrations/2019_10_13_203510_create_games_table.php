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
            $table->date('available')->default('2017-01-01');
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->boolean('outstanding')->nullable()->default(0);
            $table->string('importance')->nullable()->default(0);
            $table->string('live_id')->nullable();
            $table->boolean('status_live_id')->nullable()->default(0);
            $table->unsignedBigInteger('league_id');
            $table->json('teams_id');
            $table->text('result');
            $table->integer('status')->default(0);
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
