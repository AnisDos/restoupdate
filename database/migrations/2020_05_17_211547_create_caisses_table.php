<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->text('idCaisse')->unique();
            $table->string('caisseName');
            $table->decimal('total', 15, 2);
            $table->decimal('cacheInit', 10, 2);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('caisses');
    }
}
