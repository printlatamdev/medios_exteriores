<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('externalmedia', function (Blueprint $table) {
            $table->string('clase')->nullable();
            $table->text('location_embed')->nullable();
        });
    }

    public function down()
    {
        Schema::table('externalmedia', function (Blueprint $table) {
            $table->dropColumn(['clase', 'location_embed']);
        });
    }

};
