<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipperOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('slipper_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('option');
            $table->string('quantity');
            $table->float('price', 7, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
