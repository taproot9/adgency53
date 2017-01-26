<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adspaces', function (Blueprint $table) {

            $table->increments('id');
            $table->string('photo_name')->nullable();
            $table->integer('owner_id');
            $table->string('type');
            $table->string('size');
            $table->string('location');
            $table->integer('price');
            $table->integer('rent_price');
            $table->integer('status')->default(1);
            $table->string('posted_by');
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
        Schema::dropIfExists('adspaces');
    }
}
