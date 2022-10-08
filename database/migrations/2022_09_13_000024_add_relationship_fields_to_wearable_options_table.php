<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWearableOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('wearable_options', function (Blueprint $table) {
            $table->unsignedBigInteger('wearable_id')->nullable();
            $table->foreign('wearable_id', 'wearable_fk_7227179')->references('id')->on('wearables');
        });
    }
}
