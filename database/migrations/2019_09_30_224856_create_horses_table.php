<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Horse;

class CreateHorsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->enum('sex', Horse::$sexs);
            $table->enum('breed', Horse::$breeds);
            $table->string('color');
            $table->text('jacket_url');
            $table->date('birthday')->nullable();
            $table->unsignedBigInteger('father_id');
            // $table->foreign('father_id')
            //     ->references('id')
            //     ->on('horses');
            $table->unsignedBigInteger('mother_id');
            // $table->foreign('mother_id')
            //     ->references('id')
            //     ->on('horses');
            $table->unsignedBigInteger('grandpa');
            // $table->foreign('grandpa')
            //     ->references('id')
            //     ->on('horses');
            $table->unsignedBigInteger('haras_id');
            // $table->foreign('haras_id')
            //     ->references('id')
            //     ->on('haras');
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
        Schema::dropIfExists('horses');
    }
}
