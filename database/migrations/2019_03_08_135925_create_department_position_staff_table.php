<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentPositionStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_position_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned()->index();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('position')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
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
        Schema::dropIfExists('department_position_staff');
    }
}
