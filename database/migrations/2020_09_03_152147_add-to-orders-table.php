<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('quentity');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('adresse');
            $table->string('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('quentity');
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('city');
            $table->dropColumn('phone');
            $table->dropColumn('adresse');
        });
    }
}
