<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWearableOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('wearable_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option');
            $table->string('quantity');
            $table->float('price', 8, 2);
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
