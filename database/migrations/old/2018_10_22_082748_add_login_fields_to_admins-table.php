<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginFieldsToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function(Blueprint $table){
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
        $table->dropColumn('admin_id');
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function(Blueprint $table){
            $table->dropColumn('last_login_at');
            $table->dropColumn('last_login_ip');
        });
    
    }
}
