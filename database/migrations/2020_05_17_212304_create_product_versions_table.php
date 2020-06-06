<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('provider_id')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('return');
            $table->boolean('date_experation_bool');
            $table->date('date_experation')->nullable();
            $table->decimal('qntSTK', 15, 2);
            $table->string('codebare');
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
        Schema::dropIfExists('product_versions');
    }
}
