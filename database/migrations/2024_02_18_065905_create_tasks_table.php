<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 4000);
            $table->dateTime('start_time')->nullable(true);
            $table->dateTime('end_time')->nullable(true);
            $table->enum('task_priority', ['LOW', 'MEDIUM','HIGH'])->default('LOW')->nullable(false);
            $table->enum('task_status', ['PENDING', 'ON_GOING','ON_HOLD', 'COMPLETED'])->default('PENDING')->nullable(false);
            $table->enum('task_type', ['PRIVATE', 'PUBLIC'])->default('PRIVATE')->nullable(false);
            $table->foreignId('employee_id')->nullable(true);
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreignId('user_group_id')->nullable(true);
            $table->foreign('user_group_id')->references('id')->on('user_groups');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
