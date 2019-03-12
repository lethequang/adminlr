<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           $table->increments('id');
           $table->string('name');
           $table->string('password');
           $table->string('address')->nullable();
           $table->string('number_phone')->nullable();
           $table->string('images')->nullable();
           $table->tinyInteger('gender')->nullable();
           $table->string('email')->nullable();
           $table->tinyInteger('changed_password')->nullable();
           $table->string('remember_token')->nullable();
           $table->tinyInteger('status')->nullable();
           $table->tinyInteger('is_root')->nullable();
           $table->datetime('login_at')->nullable();
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
