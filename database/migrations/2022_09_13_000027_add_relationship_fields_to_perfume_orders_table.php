<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPerfumeOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('perfume_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7227317')->references('id')->on('customers');
            $table->unsignedBigInteger('perfume_id')->nullable();
            $table->foreign('perfume_id', 'perfume_fk_7227318')->references('id')->on('perfumees');
        });
    }
}
