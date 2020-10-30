<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 15);
            $table->decimal('amount');
            $table->string('document');
            $table->date('register_date');
            $table->string('reference');
            $table->string('email');
            $table->tinyInteger('status')->default(3);
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')
                ->references('id')
                ->on('banks');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')
                ->references('id')
                ->on('accounts');
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
        Schema::dropIfExists('pays');
    }
}
