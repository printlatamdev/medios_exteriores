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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('expiration_date_rental')->nullable();
            $table->date('payment_date_rental')->nullable();
            $table->decimal('total_rental', 11, 2)->nullable();

            $table->date('tarp_date_change')->nullable();
            $table->decimal('total_tarp', 11, 2)->nullable();

            $table->decimal('total', 11, 2)->nullable();
            $table->date('begin_date_rental')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('quote')->nullable();
            $table->string('purchaseorder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
