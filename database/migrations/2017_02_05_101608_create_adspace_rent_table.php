<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdspaceRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adspace_rent', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rent_id')->unsigned()->index()->nullable();
            $table->integer('adspace_id')->unsigned()->index()->nullable();

            $table->foreign('rent_id')
                ->references('id')->on('rents')
                ->onDelete('cascade');

            $table->foreign('adspace_id')
                ->references('id')->on('adspaces')
                ->onDelete('cascade');

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
        Schema::dropIfExists('adspace_rent');
    }
}
