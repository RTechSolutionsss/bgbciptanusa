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
            $table->dropColumn("name");
            $table->dropColumn("email");
            $table->dropColumn("phone");
        });

        db::statement("SET NAMES utf8mb4;

        INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `phone`, `attachment_ktp`, `attachment_npwp`, `attachment_saving_book`, `role_id`, `parent_id`, `deleted_at`) VALUES
        (1,'Kurnia Mulyarizqi','kurniamulyarizqi1006@gmail.com',NULL,'$2y$10$jqKueSxbH3n258xmwIRoeOKAaogYZR8A3XhgRmfD6EqJh6sFhSs06',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-02-08 05:05:22',	'2023-02-12 04:51:20',	'089654112054',	NULL,	NULL,	NULL,	1,	0,	NULL),
        (2,'Tejo','tejo@gmail.com',NULL,'$2y$10$jqKueSxbH3n258xmwIRoeOKAaogYZR8A3XhgRmfD6EqJh6sFhSs06',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-02-08 05:28:06','2023-02-12 04:09:55',NULL,NULL,NULL,NULL,2,0,NULL),
        (3,'Reza','reza@gmail.com',NULL,'$2y$10$jqKueSxbH3n258xmwIRoeOKAaogYZR8A3XhgRmfD6EqJh6sFhSs06a',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-02-11 11:48:33','2023-02-12 04:22:30',NULL,NULL,NULL,NULL,4,0,NULL);
        (4,'Reza','customer@gmail.com',NULL,'$2y$10$jqKueSxbH3n258xmwIRoeOKAaogYZR8A3XhgRmfD6EqJh6sFhSs06',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-02-11 11:48:33','2023-02-12 04:22:30',NULL,NULL,NULL,NULL,4,2,NULL);
        ");

        db::statement("SET NAMES utf8mb4;
        INSERT INTO `user_sales` (id,user_id,statuS,link,created_at,updated_at,deleted_at) VALUES
        (2,	2, 'GOLD','www.google.com',NOW(), NOW(),NULL)");
        db::statement("SET NAMES utf8mb4;
        INSERT INTO `user_customer` (id,user_id,category_id,age,job,source_information,created_at,updated_at,email,name,phone,price,status,deleted_at
        ) VALUES
        (1,	4, '1',25,'arsitek','whatsapp',NOW(), NOW(), 'customer@email.com', 500000000, 'ON_PROGRESS', NULL )");

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        db::statement("DELECT FROM users where id in (1,2,3,4);");
        db::statement("DELECT FROM user_sales where id in (2);");
        db::statement("DELECT FROM user_customer where id in (1);");

        Schema::table('user_customer', function (Blueprint $table) {
            $table->string("name");
            $table->string("email");
            $table->string("phone");
        });
    }
};
