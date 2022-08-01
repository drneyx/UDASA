<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->longText('bio');
            $table->string('image');
            $table->string('email');
            $table->string('phone');
            $table->string('position_status')->nullable();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null');
            $table->bigInteger('staff_category_id')->unsigned()->nullable();
            $table->foreign('staff_category_id')->references('id')->on('staff_categories')->onDelete('set null');
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
        Schema::dropIfExists('staff');
    }
}
