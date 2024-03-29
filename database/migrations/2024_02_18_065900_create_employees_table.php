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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('designation')->default('UNKNOWN');
            $table->foreignId('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('reports_to_id')->nullable(true);
            $table->foreign('reports_to_id')->references('id')->on('employees');
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
        Schema::dropIfExists('employees');
    }
};
