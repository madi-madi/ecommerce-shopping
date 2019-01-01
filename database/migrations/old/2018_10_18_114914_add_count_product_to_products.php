<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountProductToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
          public function up()
    {
    Schema::table('products', function($table) {
        $table->integer('product_count');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {
        $table->dropColumn('product_count');

    });
    }
}
