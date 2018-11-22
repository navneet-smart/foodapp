<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_id')->unsigned()->index();
            $table->foreign('f_id')->references('id')->on('food_trucks')->onDelete('cascade');
            $table->integer('cat_id')->unsigned()->index();
            $table->foreign('cat_id')->references('id')->on('provider_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('display_name');
            $table->text('description');
            $table->string('size_and_price');
            $table->tinyInteger('is_veg');
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
        Schema::dropIfExists('products');
    }
}
