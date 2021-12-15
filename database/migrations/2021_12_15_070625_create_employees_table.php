<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //'image', 'job_id', 'email', 'phone', 'department_id', 'designation_id', 'salary', 'join_date', 'end_date', 'em', 'status'
        Schema::create('employees', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('emp_name');
            $table->string('emp_image')->nullable();
            $table->string('job_id');
            $table->string('emp_email');
            $table->string('emp_phone');
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->string('emp_salary');
            $table->string('join_date');
            $table->string('end_date')->nullable();
            $table->string('emp_em');
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
        Schema::dropIfExists('employees');
    }
}
