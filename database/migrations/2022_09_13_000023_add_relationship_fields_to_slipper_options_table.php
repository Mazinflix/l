<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSlipperOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('slipper_options', function (Blueprint $table) {
            $table->unsignedBigInteger('slipper_id')->nullable();
            $table->foreign('slipper_id', 'slipper_fk_7226974')->references('id')->on('slippers');
        });
    }
}
