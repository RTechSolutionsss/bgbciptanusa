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
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->string("category");
            $table->timestamps();
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("id_category");
            $table->string("image");
            $table->timestamps();
        });

        DB::statement("INSERT INTO user_role (role_name, created_at) VALUES ('Administrator', NOW()),('Sales BGB',NOW()),('Customer',NOW())");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
        Schema::dropIfExists('products');
        DB::statement("TRUNCATE TABLE user_role");
        DB::statement("TRUNCATE TABLE users");
    }
};
