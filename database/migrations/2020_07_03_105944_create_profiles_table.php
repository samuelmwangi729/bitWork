<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('UserId');
            $table->longText('Portfolio');
            $table->longText('Avatar');
            $table->longText('PaymentPltform');
            $table->longText('Address');
            $table->longText('Country');
            $table->longText('Status');//to Know if the user is active or not 
            $table->longText('isVerified');
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
        Schema::dropIfExists('profiles');
    }
}
