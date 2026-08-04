<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            // Dokumen dipindahkan ke tabel pemberkasan
            $table->dropColumn('dokumen');

            // Ubah nama kolom agar lebih jelas
            $table->renameColumn('nama', 'nama_pemohon');

        });
    }

    public function down(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            $table->renameColumn('nama_pemohon', 'nama');

            $table->string('dokumen')->nullable();

        });
    }
};