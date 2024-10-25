<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sexo', 15)->nullable()->after('password');
            $table->unsignedBigInteger('idpais')->nullable()->after('password');   
            $table->foreign("idpais")
                  ->references("id")
                  ->on("pais")
                  ->onDelete("NO ACTION")
                  ->onUpdate("CASCADE");         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
