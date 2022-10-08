<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoesOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('shoes_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option')->nullable();
            $table->string('gender')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
