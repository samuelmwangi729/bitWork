<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->String('ProjectId');
            $table->longText('ProjectTitle');
            $table->longText('Slug');
            $table->longText('Description');
            $table->String('ProjectFile')->default(0);
            $table->String('ProjectCategory');
            $table->String('ClientId');
            $table->String('Budget');
            $table->integer('Status')->default(0);
            $table->String('AwardedTo')->nullable();
            $table->integer('Collaborated')->default(0);
            $table->integer('Bids');
            $table->integer('Expired');
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
        Schema::dropIfExists('projects');
    }
}
