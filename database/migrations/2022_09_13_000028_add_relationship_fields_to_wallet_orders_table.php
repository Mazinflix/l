<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWalletOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('wallet_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7227367')->references('id')->on('customers');
            $table->unsignedBigInteger('wallet_id')->nullable();
            $table->foreign('wallet_id', 'wallet_fk_7227368')->references('id')->on('wallets');
        });
    }
}
