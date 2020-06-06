<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeekProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('week_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('meal_id');
            $table->integer('saturday')->nullable();
            $table->integer('sunday')->nullable();
            $table->integer('monday')->nullable();
            $table->integer('tuesday')->nullable();
            $table->integer('wednesday')->nullable();
            $table->integer('thursday')->nullable();
            $table->integer('friday')->nullable();
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
        Schema::dropIfExists('week_programs');
    }
}
