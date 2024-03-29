<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('collection_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('collections')
            ->delete('restrict')
            ->update('cascade');
            $table->string('title');
            $table->string('price');
            $table->text('description');
            $table->integer('quantity')->default(1);
            $table->text('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
