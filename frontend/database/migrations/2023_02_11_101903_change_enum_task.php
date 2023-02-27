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
        Schema::table('tracking_url_tasks', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('checklist_at');
        });

        Schema::table('tracking_url_tasks', function (Blueprint $table) {
            $table->enum('status',['COMPLETED', 'ON_PROGRESS', 'REJECT'])->default('ON_PROGRESS');
            $table->dateTime('status_changed_at');
        });
        DB::statement("INSERT INTO user_role (role_name, created_at) VALUES ('Marketing Communication', NOW())");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracking_url_tasks', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('status_changed_at');
        });
        
        Schema::table('tracking_url_tasks', function (Blueprint $table) {
            // $table->enum('status',['SUCCESS', 'PENDING'])->default('PENDING');
            $table->dropColumn('status_changed_at');
            $table->dropColumn('status');
        });
    }
};
