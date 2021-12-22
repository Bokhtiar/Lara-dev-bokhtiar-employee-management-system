<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { // 'emp_id', 'date', 'month', 'year', 'salay', 'status',
        Schema::create('salaries', function (Blueprint $table) {
            $table->id('salary_id');
            $table->string('name');
            $table->string('job_id');
            $table->string('salary');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('salaries');
    }
}
