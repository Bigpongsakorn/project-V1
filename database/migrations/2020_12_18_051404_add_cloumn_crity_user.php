<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCloumnCrityUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('user_gender',5);
        });
        Schema::table('users', function ($table) {
            $table->string('user_age',2);
        });
        Schema::table('users', function ($table) {
            $table->string('user_dobDATE');
        });
        Schema::table('users', function ($table) {
            $table->char('user_idcard',13);
        });
        Schema::table('users', function ($table) {
            $table->string('user_pic');
        });
        Schema::table('users', function ($table) {
            $table->string('soi',5);
        });
        Schema::table('users', function ($table) {
            $table->string('moo',5);
        });
        Schema::table('users', function ($table) {
            $table->string('road',5);
        });
        Schema::table('users', function ($table) {
            $table->string('sub_district',30);
        });
        Schema::table('users', function ($table) {
            $table->string('district',50);
        });
        Schema::table('users', function ($table) {
            $table->string('province',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
