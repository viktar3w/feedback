<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
        CREATE TABLE IF NOT EXISTS `feedbacks` ( 
            `id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
            `name` VarChar( 70 ) NOT NULL,
            `phone` VarChar( 20 ) NOT NULL,
            `email` VarChar( 70 ) NOT NULL,
            `text` VarChar( 255 ) NOT NULL  COLLATE 'utf8mb4_bin',
            `created_at` datetime default CURRENT_TIMESTAMP,
            `updated_at` datetime default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `status` TinyInt( 1 ) NOT NULL DEFAULT '0',
            PRIMARY KEY ( `id` ),
            CONSTRAINT `unique_id` UNIQUE( `id` ) )
        CHARACTER SET = utf8mb4
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
        \Illuminate\Support\Facades\DB::statement('DROP TABLE IF EXISTS `feedbacks`;');
    }
}
