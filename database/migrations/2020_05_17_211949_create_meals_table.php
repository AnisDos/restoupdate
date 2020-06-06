<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('mealName');
            $table->string('mealName_ar')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('screen_id')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image')->default("meals/default.jpg");
            $table->text('description');
            $table->decimal('tax', 10, 2)->nullable();
            $table->string('public')->default(true);
            $table->integer('day_prg')->nullable();
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
        Schema::dropIfExists('meals');
    }
}
