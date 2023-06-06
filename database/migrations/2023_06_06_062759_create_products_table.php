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
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('species_id');
            $table->unsignedBigInteger('roast_level_id');
            $table->unsignedBigInteger('tasted_id');
            $table->unsignedBigInteger('processing_id');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->integer('stock')->default(0)->nullable();
            $table->integer('price')->default(0)->nullable();
            $table->integer('rating')->default(0)->nullable();
            $table->text('filename')->nullable();
            $table->text('filepath')->nullable();
            $table->text('description')->nullable();
            $table->text('information')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
