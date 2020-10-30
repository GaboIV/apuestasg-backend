<?php

use App\Player;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('name');
            $table->string('lastname');
            $table->date('birthday')->nullable();
            $table->enum('gender', Player::$genders);
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')
                ->references('id')
                ->on('states');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
            $table->unsignedBigInteger('parish_id')->nullable();
            $table->foreign('parish_id')
                ->references('id')
                ->on('parishes');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->enum('treatment', Player::$treatments);
            $table->decimal('available', 17,2)->default(0);
            $table->decimal('risk', 17,2)->default(0);
            $table->decimal('points', 17,2)->default(0);
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('timezone')->nullable();
            $table->string('format_quot')->nullable();
            $table->tinyInteger('offer')->nullable();
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('players');
    }
}
