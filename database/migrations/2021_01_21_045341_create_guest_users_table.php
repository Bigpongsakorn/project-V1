<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_users', function (Blueprint $table) {
            $table->bigIncrements('guest_id');
            $table->string('guest_fname', 100);
            $table->string('guest_lname', 100);
            $table->string('guest_gender', 5);
            $table->integer('guest_age');
            $table->date('guest_dob');
            $table->char('guest_idcard', 13);
            $table->text('guest_address');
            $table->char('guest_tel', 10);
            $table->string('guset_email', 50);
            $table->integer('area_id');
            $table->integer('province');
            $table->integer('district');
            $table->integer('sub_district');
            $table->integer('zip_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_users');
    }
}
