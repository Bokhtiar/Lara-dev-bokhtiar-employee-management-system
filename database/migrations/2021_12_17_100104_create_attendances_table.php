<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //'employee_id', 'in', 'out', 'em', 'address', 'status',
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->integer('emp_id');
            $table->string('in')->nullable();
            $table->string('out')->nullable();
            $table->string('em');
            $table->string('job_id');
            $table->string('let');
            $table->string('lon');
            $table->string('streetAdreess');
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
        Schema::dropIfExists('attendances');
    }
}
