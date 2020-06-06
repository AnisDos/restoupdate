<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('product_version_id')->nullable();
            $table->enum('type', array('addqnt', 'revokeqnt', 'addnew', 'delete'));
            $table->decimal('oldqnt', 15, 2)->nullable();
            $table->decimal('qnt', 15, 2)->nullable();
            $table->string('noteIfDelete')->nullable();
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
        Schema::dropIfExists('transaction_histories');
    }
}
