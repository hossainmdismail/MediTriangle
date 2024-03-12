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
        Schema::create('health_card_applicatons', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('number',255);
            $table->string('address',255);
            $table->string('status')->nullable();
            $table->string('note', 255)->nullable();
            $table->string('passport_nid',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_card_applicatons');
    }
};
