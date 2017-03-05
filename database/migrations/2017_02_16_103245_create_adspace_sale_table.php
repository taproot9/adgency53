<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdspaceSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adspace_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned()->index()->nullable();
            $table->integer('adspace_id')->unsigned()->index()->nullable();

            $table->foreign('sale_id')
                ->references('id')->on('sales')
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
        Schema::dropIfExists('adspace_sale');
    }
}
