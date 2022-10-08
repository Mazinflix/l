<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfumeesTable extends Migration
{
    public function up()
    {
        Schema::create('perfumees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('size')->nullable();
            $table->string('gender')->nullable();
            $table->float('price', 7, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
