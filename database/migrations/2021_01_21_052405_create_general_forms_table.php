<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_forms', function (Blueprint $table) {
            $table->bigIncrements('general_id');
            $table->string('general_name',100);
            $table->date('general_date');
            $table->char('general_tel',10);
            $table->text('general_detail');
            $table->foreignId('user_id');
            $table->foreignId('guest_id');
            $table->foreignId('location_id');
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
        Schema::dropIfExists('general_forms');
    }
}
