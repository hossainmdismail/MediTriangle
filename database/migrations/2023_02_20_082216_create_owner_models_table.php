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
        Schema::create('owner_models', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->string('email');
            $table->bigInteger('number');
            $table->bigInteger('landline')->nullable();
            $table->longText('address');
            $table->integer('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_models');
    }
};
