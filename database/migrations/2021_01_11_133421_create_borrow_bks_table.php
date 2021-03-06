<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowBksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_bks', function (Blueprint $table) {
            $table->bigIncrements('borrow_id');
            $table->timestamps();
            $table->string('borrow_title', 100);
            $table->integer('borrow_amount');
            $table->foreignId('equip_id');
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_bks');
    }
}
