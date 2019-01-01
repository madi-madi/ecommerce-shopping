<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('category_id')->unsignedin();
            $table->integer('admin_id')->unsignedin();
            $table->decimal('weight')->nullable();
            $table->integer('product_count');
            $table->integer('discount')->nullable();
            $table->datetime('from')->nullable();
            $table->datetime('to')->nullable();
            $table->SoftDeletes();
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
