<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('nOrder');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->unsignedBigInteger('caisse_id');
            $table->decimal('taux', 10, 2)->nullable();
            $table->enum('orderType', array('local', 'delivery', 'delevryCompany', 'delevryboy'));
            $table->string('orderStatus');
            $table->decimal('priceOrder', 15, 2);
            $table->string('paymentStatus');
            $table->string('paymentMethod');
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
        Schema::dropIfExists('orders');
    }
}
