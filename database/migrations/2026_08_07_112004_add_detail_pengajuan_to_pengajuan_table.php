<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            // Data objek tanah
            $table->text('alamat_objek_tanah')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten_kota')->nullable();

            // Data pengajuan
            $table->text('tujuan_pengajuan')->nullable();
            $table->text('keterangan')->nullable();

            // Data hibah
            $table->string('hubungan_pemberi_penerima')->nullable();

            // Data warisan
            $table->string('nama_pewaris')->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->integer('jumlah_ahli_waris')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan', function (Blueprint $table) {

            $table->dropColumn([
                'alamat_objek_tanah',
                'kecamatan',
                'kabupaten_kota',
                'tujuan_pengajuan',
                'keterangan',
                'hubungan_pemberi_penerima',
                'nama_pewaris',
                'tanggal_meninggal',
                'jumlah_ahli_waris',
            ]);
        });
    }
};