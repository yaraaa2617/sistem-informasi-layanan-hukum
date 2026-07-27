<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengajuan;
use App\Models\User;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PengajuanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // ambil semua user (biar realistis)
        $users = User::all();

        $layananList = [
            'Akta Jual Beli',
            'Akta Hibah',
            'Akta Warisan',
            'APHB'
        ];

        $statusList = [
            'pending',
            'diproses',
            'dipanggil',
            'selesai'
        ];

        $start = Carbon::create(2020, 1, 1);
        $end   = Carbon::create(2026, 4, 30);

        $jumlahData = 200; // bisa 1000, 10000, dll

        for ($i = 0; $i < $jumlahData; $i++) {

            $user = $users->random();

            $randomTimestamp = rand($start->timestamp, $end->timestamp);
            $tanggal = Carbon::createFromTimestamp($randomTimestamp);

            $layanan = $faker->randomElement($layananList);

            Pengajuan::create([
                'user_id' => $user->id,
                'layanan' => $layanan,
                'nama' => $faker->name(),
                'status' => $faker->randomElement($statusList),

                // isi dummy dokumen (biar tidak null/error)
                'dokumen' => json_encode([
                    'ktp' => 'dummy/ktp.pdf',
                    'kk' => 'dummy/kk.pdf',
                    'sertifikat' => 'dummy/sertifikat.pdf',
                ]),

                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]);
        }
    }
}
