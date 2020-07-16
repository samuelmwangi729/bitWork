<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitworkProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitwork_profits', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionId');
            $table->string('ProjectId');
            $table->string('Amount');
            $table->string('Description');
            $table->string('Status')->default('0');
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
        Schema::dropIfExists('bitwork_profits');
    }
}
