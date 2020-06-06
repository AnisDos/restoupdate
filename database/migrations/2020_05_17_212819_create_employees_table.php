<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('idEmployee')->unique();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('nameEmployee');
            $table->double('tel', 15);
            $table->decimal('hWork', 5, 1);
            $table->decimal('price_ph', 12, 2);
            $table->enum('type', array('cashier', 'cook'));
            $table->string('active')->default(true);
            $table->string('image')->default("users/default.jpg");
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
        Schema::dropIfExists('employees');
    }
}
