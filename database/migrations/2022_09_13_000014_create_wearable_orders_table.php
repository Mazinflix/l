<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWearableOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('wearable_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->float('price', 7, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
