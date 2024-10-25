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
        // Schema::table('users', function (Blueprint $table) {
        //     $table->unsignedBigInteger('idroles')->nullable()->after('password');
        //     $table->foreign("idroles")
        //           ->references("id")
        //           ->on("roles")
        //           ->onDelete("CASCADE")
        //           ->onUpdate("CASCADE");
        // });
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
