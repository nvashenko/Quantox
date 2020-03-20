<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentBoard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table boards
            (
                id   INTEGER not null
                    constraint boards_pk
                        primary key autoincrement,
                type varchar(255)
            );
        ");
        DB::statement("
            create table grades
            (
                id         INTEGER    not null
                    constraint grades_pk
                        primary key autoincrement,
                grade      TINYINT(1) not null,
                student_id int        not null
            );
        ");
        DB::statement("
            create table students
            (
                id       INTEGER not null
                    constraint students_pk
                        primary key autoincrement,
                name     VARCHAR(255) default '' not null,
                board_id INTEGER      default 0 not null
            );
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE students');
        DB::statement('DROP TABLE grades');
        DB::statement('DROP TABLE boards');
    }
}
