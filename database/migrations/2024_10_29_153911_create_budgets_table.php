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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            //bail -fianza
            $table->decimal('total_bail', 11, 2)->nullable();
            $table->date('expiration_date_bail')->nullable();
            $table->date('payment_date_bail')->nullable();
            //damage_insurance - seguro de daños a 3ros
            $table->decimal('total_damageinsurance', 11, 2)->nullable();
            $table->date('expiration_date_damageinsurance')->nullable();
            $table->date('payment_date_damageinsurance')->nullable();
            //alcaldía
            $table->decimal('total_municipality', 11, 2)->nullable();
            $table->date('expiration_date_municipality')->nullable();
            $table->date('payment_date_municipality')->nullable();
            //rental - arrendamiento
            $table->decimal('total_rental', 11, 2)->nullable();
            $table->date('expiration_date_rental')->nullable();
            $table->date('payment_date_rental')->nullable();
            //maintenance - mantenimiento
            $table->decimal('total_maintenance', 11, 2)->nullable();
            $table->date('payment_date_maintenance')->nullable();
            $table->text('maintenance_description')->nullable();
            //electrical_energy - energía eléctrica
            $table->integer('illuminated')->nullable();
            $table->string('electricity_provider')->nullable();
            $table->string('electricity_NIC_NIS')->nullable();
            $table->string('electricity_new_NC')->nullable();
            $table->decimal('total_electricity', 11, 2)->nullable();
            $table->date('expiration_date_electricity')->nullable();
            $table->date('payment_date_electricity')->nullable();
            //total
            $table->decimal('total_payment', 11, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
