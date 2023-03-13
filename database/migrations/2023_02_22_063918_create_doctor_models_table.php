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
        Schema::create('doctor_models', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('name');
            $table->string('profile')->nullable();
            $table->string('career_title')->nullable();
            $table->longText('speciality')->nullable();
            $table->bigInteger('fee');
            $table->bigInteger('vat');
            $table->bigInteger('video_fee')->nullable();
            $table->bigInteger('video_vat')->nullable();
            $table->integer('activity')->default(1);
            $table->integer('created_by');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_models');
    }
};
