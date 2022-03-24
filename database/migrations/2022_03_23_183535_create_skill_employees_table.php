<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SkillEmployee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skill')->nullable();
            $table->unsignedBigInteger('employee')->nullable();

            $table->foreign('skill')->references('id')->on('Skill');
            $table->foreign('employee')->references('id')->on('Employee');
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
        Schema::dropIfExists('SkillEmployee');
    }
}
