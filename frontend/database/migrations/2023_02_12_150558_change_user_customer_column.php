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
            $table->string("price");
            $table->enum('status',['COMPLETED', 'ON_PROGRESS', 'REJECTED'])->default('ON_PROGRESS');
            $table->softDeletes();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string("name_product");
            $table->string("price");
            $table->text("description");
            $table->softDeletes();
        });

        Schema::table('tracking_url_tasks', function (Blueprint $table) {
            $table->dropColumn("is_checklist");
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
            $table->dropColumn("email");
            $table->dropColumn("name");
            $table->dropColumn("phone");
            $table->dropColumn("price");
            $table->dropColumn('status');
            $table->dropColumn("deleted_at");
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("name_product");
            $table->dropColumn("price");
            $table->dropColumn("description");
            $table->dropColumn("deleted_at");
        });
    }
};
