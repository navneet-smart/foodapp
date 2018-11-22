<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_id')->unsigned()->index();
            $table->foreign('f_id')->references('id')->on('food_trucks')->onDelete('cascade');
            $table->string('category');
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
        Schema::dropIfExists('provider_categories');
    }
}
