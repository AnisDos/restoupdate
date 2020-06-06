<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPrivilegeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_privilege', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('privilege_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('privilege_id')->references('id')->on('privileges')->onDelete('cascade');
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
        Schema::dropIfExists('admin_privilege');
    }
}
