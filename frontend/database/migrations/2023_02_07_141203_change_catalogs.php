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

        DB::statement("INSERT INTO user_role (role_name, created_at) VALUES ('ADMIN', NOW()),('SALES',NOW()),('CUSTOMER',NOW())");
        //DB::statement("INSERT INTO users (name, email, password, profile_photo_path, phone, attachment_ktp, attachment_npwp, attachment_saving_book,role_id,parent_id) VALUES ('administrator', 'email.email.com','', '1234567890', '','','',1,0");
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
