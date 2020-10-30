<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bet_types', function( Blueprint $table ) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('adding')->nullable();
            $table->unsignedBigInteger('index')->nullable();
            $table->string('option')->nullable();
            $table->unsignedBigInteger('importance');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
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
        Schema::dropIfExists('bet_types');
    }
}
