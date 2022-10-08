<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWearablesTable extends Migration
{
    public function up()
    {
        Schema::create('wearables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country')->nullable();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
