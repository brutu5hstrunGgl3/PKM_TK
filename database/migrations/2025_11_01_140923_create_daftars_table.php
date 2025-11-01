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
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable(); // Judul form (opsional)
            $table->text('deskripsi')->nullable(); // Deskripsi (opsional)
            $table->string('link_form'); // Link Google Form
            $table->boolean('status')->default(true); // aktif/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};
