<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSlipperOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('slipper_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7227308')->references('id')->on('customers');
            $table->unsignedBigInteger('slipper_id')->nullable();
            $table->foreign('slipper_id', 'slipper_fk_7227309')->references('id')->on('slippers');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->foreign('option_id', 'option_fk_7227310')->references('id')->on('slipper_options');
        });
    }
}
