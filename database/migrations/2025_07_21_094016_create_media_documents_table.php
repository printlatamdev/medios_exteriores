<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('externalmedia_id')->constrained()->onDelete('cascade');
            $table->string('document_type');
            $table->string('document_name');
            $table->date('issued_at')->nullable();
            $table->date('expires_at')->nullable();
            $table->string('file_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_documents');
    }
};
