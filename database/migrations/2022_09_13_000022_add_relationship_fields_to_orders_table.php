<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('name_id')->nullable();
            $table->foreign('name_id', 'name_fk_7307460')->references('id')->on('customers');
            $table->unsignedBigInteger('shoe_id')->nullable();
            $table->foreign('shoe_id', 'shoe_fk_7191600')->references('id')->on('shoes');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id', 'option_fk_7191601')->references('id')->on('shoes_options');
        });
    }
}
