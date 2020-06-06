<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('codePromo')->nullable();
            $table->decimal('taux', 10, 2);
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->integer('nbr_rst')->nullable();
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
        Schema::dropIfExists('promos');
    }
}
