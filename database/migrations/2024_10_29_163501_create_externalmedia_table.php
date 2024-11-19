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
            $table->text('address')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('gallery')->nullable();
            $table->json('location')->nullable();
            $table->string('traffic_flow')->nullable();
            $table->string('lighting')->nullable();
            $table->float('rental', 11, 2)->nullable();
            $table->string('production')->nullable();
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
