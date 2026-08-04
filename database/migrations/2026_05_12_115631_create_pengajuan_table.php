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

$table->foreignId('user_id')
      ->constrained()
      ->onDelete('cascade');


// Relasi ke tabel layanan
$table->foreignId('layanan_id')
      ->constrained('layanans')
      ->onDelete('cascade');


$table->string('nama');

$table->longText('dokumen')->change();

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
