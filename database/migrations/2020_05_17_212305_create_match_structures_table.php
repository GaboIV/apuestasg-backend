<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->integer('division_number');
            $table->string('division_name_singular', 100);
            $table->string('division_name_plural', 100)->nullable();
            $table->string('annotation_name_singular', 100);
            $table->string('annotation_name_plural', 100)->nullable();
            $table->tinyInteger('principal');
            $table->tinyInteger('halftime');
            $table->string('type', 10);
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
        Schema::dropIfExists('match_structures');
    }
}
