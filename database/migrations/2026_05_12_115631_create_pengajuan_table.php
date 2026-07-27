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
        Schema::create('pengajuan', function (Blueprint $table) {

            $table->id();

            // User yg mengajukan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Nama layanan
            $table->string('layanan');

            // Nama pemohon
            $table->string('nama');

            // Upload dokumen
            $table->string('dokumen');

            // Status
            $table->enum('status', [
                'pending',
                'diproses',
                'dipanggil',
                'selesai'
            ])->default('pending');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
