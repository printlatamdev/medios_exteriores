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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date')->nullable();
            $table->foreignId('contract_id')->constrained();
            $table->string('payment_term')->nullable(); 
            $table->string('scheduled_payments')->nullable(); 
            $table->string('status')->default('Pendiente de facturar'); //Pendiente de facturar, pendiente de pago, cancelado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
