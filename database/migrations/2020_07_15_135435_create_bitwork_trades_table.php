<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitworkTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitwork_trades', function (Blueprint $table) {
            $table->id();
            $table->string('TradeId');
            $table->string('TransactionId');
            $table->string('Client');
            $table->string('Trader');
            $table->string('AmountSold');
            $table->string('AmountBought');
            $table->string('Status')->default(0);
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
        Schema::dropIfExists('bitwork_trades');
    }
}
