<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
    Schema::table('externalmedia', function (Blueprint $table) {
        // Solo agregamos municipality_id si no existe
        if (!Schema::hasColumn('externalmedia', 'municipality_id')) {
            $table->foreignId('municipality_id')->nullable()->constrained()->nullOnDelete();
        }
    });
}

    public function down(): void
{
    Schema::table('externalmedia', function (Blueprint $table) {
        $table->dropForeign(['municipality_id']);
        $table->dropColumn(['municipality_id']);
    });
}

};
