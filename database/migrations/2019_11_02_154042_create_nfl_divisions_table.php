<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNflDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nfl_divisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nfl_conference_id')->unsigned();
            $table->string('title');
            $table->string('alias');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('nfl_conference_id')->references('id')->on('nfl_conferences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nfl_divisions');
    }
}
