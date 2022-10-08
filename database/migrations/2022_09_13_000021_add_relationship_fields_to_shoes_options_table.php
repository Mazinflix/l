<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShoesOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('shoes_options', function (Blueprint $table) {
            $table->unsignedBigInteger('shoe_id')->nullable();
            $table->foreign('shoe_id', 'shoe_fk_7191588')->references('id')->on('shoes');
        });
    }
}
