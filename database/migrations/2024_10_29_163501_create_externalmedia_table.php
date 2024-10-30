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
        Schema::create('externalmedia', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->boolean('status')->default(false);
            $table->text('address');
            $table->string('width');
            $table->string('height');
            $table->string('gallery');
            $table->foreignId('mediatype_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('externalmedia');
    }
};
