<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNflTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfl_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nfl_division_id')->unsigned();
            $table->string('title');
            $table->string('name');
            $table->string('slug', 3)->unique();
            $table->timestamps();

            $table->foreign('nfl_division_id')->references('id')->on('nfl_divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nfl_teams');
    }
}
