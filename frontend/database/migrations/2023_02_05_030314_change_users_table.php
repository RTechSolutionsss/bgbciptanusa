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
            $table->string('phone')->nullable();
            $table->string('attachment_ktp')->nullable();
            $table->string('attachment_npwp')->nullable();
            $table->string('attachment_saving_book')->nullable();
            $table->integer('role_id')->default(1);
            $table->integer('parent_id')->default(0);
        });

        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->timestamps();
        });

        Schema::create('user_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('status',['GOLD', 'PLATINUM'])->nullable()->default('GOLD');
            $table->string('link');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tracking_url_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->string('ip_address');
            $table->enum('status',['SUCCESS', 'PENDING'])->default('PENDING');
            $table->boolean('is_checklist')->default(false);
            $table->dateTime('checklist_at');
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
        Schema::dropIfExists('tracking_url_tasks');
        Schema::dropIfExists('user_role');
        Schema::dropIfExists('user_sales');
       
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('attachment_ktp');
            $table->dropColumn('attachment_npwp');
            $table->dropColumn('attachment_saving_book');
            $table->dropColumn('role_id');
            $table->dropColumn('parent_id');
        });
    }
};
