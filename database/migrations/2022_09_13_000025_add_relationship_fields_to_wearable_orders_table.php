<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWearableOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('wearable_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7227299')->references('id')->on('customers');
            $table->unsignedBigInteger('wearable_id')->nullable();
            $table->foreign('wearable_id', 'wearable_fk_7227300')->references('id')->on('wearables');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id', 'option_fk_7227301')->references('id')->on('wearable_options');
        });
    }
}
