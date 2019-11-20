<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFeedbackLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
        CREATE TABLE `user_feedback_logs` ( 
            `id` Int( 10 ) UNSIGNED AUTO_INCREMENT NOT NULL,
            `user_id` Int( 10 ) UNSIGNED NOT NULL DEFAULT 0,
	        `feedback_id` Int( 10 ) UNSIGNED NOT NULL,
            `action` VarChar( 70 ) NOT NULL,
            `created_at` DateTime NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY ( `id` ),
            CONSTRAINT `unique_id` UNIQUE( `id` ) )
        CHARACTER SET = utf8mb4
        COLLATE = utf8mb4_general_ci
        ENGINE = InnoDB
        AUTO_INCREMENT = 1;
        ");
        \Illuminate\Support\Facades\DB::statement("
            
        CREATE INDEX `index_feedback_id` USING BTREE ON `user_feedback_logs`( `feedback_id` );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement('
        DROP INDEX `index_feedback_id` ON `user_feedback_logs`;
        ');
        \Illuminate\Support\Facades\DB::statement('
        DROP TABLE IF EXISTS `user_feedback_logs`;
        ');
    }
}
