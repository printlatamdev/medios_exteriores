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
        Schema::create('fences', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('status');
            $table->text('address');
            $table->string('width');
            $table->string('height');
            $table->foreignId('typefence_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fences');
    }
};
