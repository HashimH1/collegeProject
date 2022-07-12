<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->integer('department_id')->unsigned();
            $table->string('date');
            $table->string('vaccine');
            $table->string('Vaccinedate')->nullble();
            $table->string('vaccinephoto')->nullble();
            $table->string('email')->unique();
            $table->string('password');

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
        Schema::dropIfExists('employee');
    }
};
