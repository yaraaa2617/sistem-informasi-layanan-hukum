<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            // hapus kolom layanan lama (teks)
            $table->dropColumn('layanan');

            // tambah relasi ke tabel layanans
            $table->foreignId('layanan_id')
                ->after('user_id')
                ->constrained('layanans')
                ->onDelete('cascade');

        });
    }


    public function down(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            $table->dropForeign(['layanan_id']);

            $table->dropColumn('layanan_id');

            $table->string('layanan');

        });
    }
};