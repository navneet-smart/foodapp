<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_detail_id')->unsigned()->index();
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->text('description');
            $table->string('display_name');
            $table->integer('f_id');
            $table->integer('p_id');
            $table->float('price');
            $table->integer('quantity');
            $table->bigInteger('total');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('items');
    }
}
