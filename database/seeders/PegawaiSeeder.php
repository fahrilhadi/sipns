<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 25; $i++) {
            DB::table('pegawais')->insert([
                'nip' => '19800' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama' => 'Pegawai ' . $i,
                'tempat_lahir' => 'Padang',
                'tgl_lahir' => '1985-01-' . str_pad(($i % 28) + 1, 2, '0', STR_PAD_LEFT),
                'jenis_kelamin' => $i % 2 == 0 ? 'L' : 'P',
                'alamat' => 'Jl. Contoh No.' . $i . ', Padang',
                'no_hp' => '0812' . rand(10000000, 99999999),
                'npwp' => '09.123.456.' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'agama_id' => rand(1, 5),
                'golongan_id' => rand(1, 5),
                'eselon_id' => rand(1, 5),
                'jabatan_id' => rand(1, 5),
                'unit_kerja_id' => rand(1, 5),
                'tempat_tugas_id' => rand(1, 5),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
