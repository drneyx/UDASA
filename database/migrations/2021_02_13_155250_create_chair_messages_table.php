<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChairMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chair_messages', function (Blueprint $table) {
            $table->id();
            $table->longText('message');
            $table->bigInteger('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null');
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
        Schema::dropIfExists('chair_messages');
    }
}
