<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_type_id');
            $table->foreign('event_type_id')
                ->references('id')
                ->on('event_types');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players');
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets');
            $table->decimal('amount', 17, 2)->nullable(0);
            $table->decimal('player_balance', 17, 2)->nullable(0);
            $table->unsignedBigInteger('user_admin');
            $table->foreign('user_admin')
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
        Schema::dropIfExists('transactions');
    }
}
