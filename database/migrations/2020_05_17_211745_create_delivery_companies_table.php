<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_companies', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->string('deliveryCompaniesName');
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
            $table->double('tel', 15)->nullable();
            $table->decimal('percentage', 10, 2)->nullable();
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
        Schema::dropIfExists('delivery_companies');
    }
}
