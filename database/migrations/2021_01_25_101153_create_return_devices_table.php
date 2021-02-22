<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_devices', function (Blueprint $table) {
            $table->bigIncrements('return_id');
            $table->timestamps();
            $table->string('return_title', 100);
            $table->integer('return_amount');
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
        Schema::dropIfExists('return_devices');
    }
}
