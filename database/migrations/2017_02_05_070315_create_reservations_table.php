<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('reserve_date');
            $table->integer('owner_id')->unsigned()->index()->nullable();
            $table->integer('client_id')->unsigned()->index()->nullable();
            $table->integer('is_seen')->default(0);
            $table->integer('is_seen_owner')->default(0);
            $table->integer('is_seen_client')->default(0);
            $table->date('reserve_until')->nullable();
            $table->integer('billboard_id')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}
