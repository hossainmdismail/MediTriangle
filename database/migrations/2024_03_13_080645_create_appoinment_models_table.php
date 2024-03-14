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
        Schema::create('appoinment_models', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('hospital_id');
            $table->integer('department_id');
            $table->string('name',255);
            $table->bigInteger('number');
            $table->string('email',255)->nullable();
            $table->string('status',255)->nullable();
            $table->string('note',255)->nullable();
            $table->timestamps();




            // $table->id();
            // $table->integer('user_id');
            // $table->integer('country_id');
            // $table->integer('state_id');
            // $table->integer('hospital_id');
            // $table->integer('department_id');
            // $table->integer('doctor_id');
            // $table->integer('fee')->nullable();
            // $table->integer('status')->default('0');
            // $table->integer('order_status')->default('0');
            // $table->integer('notifications')->default('0');
            // $table->string('order_id')->nullable();
            // $table->date('activity')->nullable();
            // $table->date('appoinment_date')->nullable();
            // $table->integer('appointment_type');
            // $table->bigInteger('number')->nullable();
            // $table->string('passportname');
            // $table->string('passportnumber');
            // $table->string('passport');
            // $table->string('note')->nullable();
            // $table->string('gender');
            // $table->integer('age');
            // $table->longText('message')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinment_models');
    }
};
