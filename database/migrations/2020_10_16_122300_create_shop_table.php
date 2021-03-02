<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('shop_id');
            $table->integer('classification_id');
            $table->string('shop_name');
            $table->string('image');
            $table->float('price');
            $table->integer('num');
            $table->text('text');
            $table->boolean('display');
            $table->boolean('top');
            $table->dateTime('time');
            $table->integer('sale')->nullable();
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
        Schema::dropIfExists('shop');
    }
}
