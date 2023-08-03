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
        Schema::create('visa_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->string('order_id')->nullable();
            $table->string('order_status')->default(0);
            $table->string('notifications')->default(0);
            $table->integer('country_id');
            $table->integer('visa_id');
            $table->integer('embassy_id');
            $table->integer('state_id');
            $table->integer('hospital_id');
            $table->integer('department_id');
            $table->integer('doctor_id');
            $table->string('prescription');
            $table->date('expected_date');
            $table->date('appointment_date')->nullable();
            $table->string('passport');
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
        Schema::dropIfExists('visa_models');
    }
};
