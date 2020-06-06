<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('deleveryCompany_id')->nullable();
            $table->decimal('priceCharge', 10, 2);
            $table->enum('type', array('stock', 'employee', 'delevryCompany', 'additional'));
            $table->string('note')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('charges');
    }
}
