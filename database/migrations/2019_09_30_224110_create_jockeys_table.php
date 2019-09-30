<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJockeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jockeys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('weight');
            $table->decimal('height');
            $table->string('country_id');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
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
        Schema::dropIfExists('jockeys');
    }
}
