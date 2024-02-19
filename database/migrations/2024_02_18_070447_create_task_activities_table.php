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
        Schema::create('task_activities', function (Blueprint $table) {
            $table->id();
            $table->string('description', 4000);
            $table->dateTime('activity_time')->default(now())->nullable(false);
            $table->foreignId('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreignId('employee_id')->nullable(false);
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_activities');
    }
};
