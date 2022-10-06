<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('orders')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('product_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('products')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('order_items');
    }
}
