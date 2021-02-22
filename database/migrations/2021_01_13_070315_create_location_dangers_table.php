<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationDangersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_dangers', function (Blueprint $table) {
            $table->bigIncrements('location_id');
            $table->string('location_name', 100);
            $table->text('location_detail');
            $table->foreignId('risk_id');
            $table->foreignId('vaillage_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('location_dangers');
    }
}
