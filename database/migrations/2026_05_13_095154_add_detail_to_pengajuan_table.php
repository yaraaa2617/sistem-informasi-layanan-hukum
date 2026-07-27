<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            $table->string('nama_penjual')->nullable();
            $table->string('telepon_penjual')->nullable();

            $table->string('nama_pembeli')->nullable();
            $table->string('telepon_pembeli')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            $table->dropColumn([
                'nama_penjual',
                'telepon_penjual',
                'nama_pembeli',
                'telepon_pembeli'
            ]);

        });
    }
};
