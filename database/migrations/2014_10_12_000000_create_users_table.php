<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
        CREATE TABLE `users` ( 
            `id` BigInt( 20 ) UNSIGNED AUTO_INCREMENT NOT NULL,
            `name` VarChar( 70 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
            `email` VarChar( 70 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `email_verified_at` Timestamp NULL,
            `password` VarChar( 255 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
            `remember_token` VarChar( 100 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
            `created_at` Timestamp NULL,
            `updated_at` Timestamp NULL,
            PRIMARY KEY ( `id` ),
            CONSTRAINT `users_email_unique` UNIQUE( `email` ) )
        CHARACTER SET = utf8mb4
        COLLATE = utf8mb4_unicode_ci
        ENGINE = InnoDB
        AUTO_INCREMENT = 1;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement('DROP TABLE IF EXISTS `users`;');
    }
}
