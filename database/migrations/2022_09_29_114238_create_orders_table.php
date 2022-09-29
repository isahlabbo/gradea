<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('customers')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('delivery_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('deliveries')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('payment_method_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('payment_methods')
            ->delete('restrict')
            ->update('cascade');
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
