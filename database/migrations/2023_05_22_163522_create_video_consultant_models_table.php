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
        Schema::create('video_consultant_models', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('doctor_id');
            $table->string('name');
            $table->string('number');
            $table->string('gender');
            $table->integer('age');
            $table->date('expected_date');
            $table->timestamp('appointment_date')->nullable();
            $table->integer('notification')->default(0);
            $table->string('prescription');
            $table->integer('order_status')->default(0);
            $table->string('fee');
            $table->string('note')->nullable();
            $table->string('message')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_consultant_models');
    }
};
