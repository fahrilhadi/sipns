<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // gunakan lokal Indonesia

        for ($i = 1; $i <= 25; $i++) {
            // jenis kelamin acak
            $jenis_kelamin = $faker->randomElement(['L', 'P']);

            // buat nama berdasarkan jenis kelamin
            $nama = $jenis_kelamin === 'L' 
                ? $faker->firstNameMale . ' ' . $faker->lastName 
                : $faker->firstNameFemale . ' ' . $faker->lastName;

            DB::table('pegawais')->insert([
                'nip' => '19' . $faker->numerify('8###########'), // NIP random mirip format aslinya
                'nama' => $nama,
                'tempat_lahir' => $faker->randomElement([
                    'Jakarta', 'Bandung', 'Surabaya', 'Padang', 'Yogyakarta', 'Medan', 'Denpasar', 'Makassar'
                ]),
                'tgl_lahir' => $faker->dateTimeBetween('-55 years', '-25 years')->format('Y-m-d'),
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $faker->streetAddress . ', ' . $faker->city,
                'no_hp' => '08' . rand(11, 99) . rand(10000000, 99999999),
                'npwp' => $faker->numerify('##.###.###.#-###.###'),
                'agama_id' => rand(1, 5),
                'golongan_id' => rand(1, 6),
                'eselon_id' => rand(1, 5),
                'jabatan_id' => rand(1, 10),
                'unit_kerja_id' => rand(1, 10),
                'tempat_tugas_id' => rand(1, 10),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
