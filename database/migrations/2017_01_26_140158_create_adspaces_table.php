<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdspacesTable extends Migration
{
    public function up()
    {
        Schema::create('adspaces', function (Blueprint $table) {

            $table->increments('id');
            $table->string('photo_name')->nullable();
            $table->integer('owner_id');
            $table->string('adspace_type');
            $table->string('size');
            $table->string('location');
            $table->integer('price');
            $table->integer('status')->default(1);
            $table->integer('reserve')->default(0);
            $table->string('advertising_type');
            $table->string('posted_by');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('adspaces');
    }
}
