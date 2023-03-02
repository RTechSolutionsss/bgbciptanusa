<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_customer', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('no_ktp');
            $table->dropColumn('tgl_lahir');
        });
        Schema::table('user_customer', function (Blueprint $table) {
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->integer('product_id');
            $table->text('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_customer', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('no_ktp');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('product_id');
            $table->dropColumn('notes');
        });
        Schema::table('user_customer', function (Blueprint $table) {
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('no_ktp')->nullable();
            $table->text('tgl_lahir')->nullable();
        });
    }
};
