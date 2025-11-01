<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Agama
        DB::table('agamas')->insert([
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katolik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
        ]);

        // Golongan
        DB::table('golongans')->insert([
            ['nama_golongan' => 'II/a'],
            ['nama_golongan' => 'II/b'],
            ['nama_golongan' => 'III/a'],
            ['nama_golongan' => 'III/b'],
            ['nama_golongan' => 'IV/a'],
        ]);

        // Eselon
        DB::table('eselons')->insert([
            ['nama_eselon' => 'I.a'],
            ['nama_eselon' => 'II.a'],
            ['nama_eselon' => 'III.a'],
            ['nama_eselon' => 'IV.a'],
            ['nama_eselon' => 'V.a'],
        ]);

        // Jabatan
        DB::table('jabatans')->insert([
            ['nama_jabatan' => 'Guru'],
            ['nama_jabatan' => 'Staf TU'],
            ['nama_jabatan' => 'Kepala Sekolah'],
            ['nama_jabatan' => 'Bendahara'],
            ['nama_jabatan' => 'Pengawas Sekolah'],
        ]);

        // Unit Kerja
        DB::table('unit_kerjas')->insert([
            ['nama_unit' => 'Dinas Pendidikan'],
            ['nama_unit' => 'Sekretariat'],
            ['nama_unit' => 'Bidang Kurikulum'],
            ['nama_unit' => 'Bidang Kesiswaan'],
            ['nama_unit' => 'Bidang Kepegawaian'],
        ]);

        // Tempat Tugas
        DB::table('tempat_tugas')->insert([
            ['nama_tempat' => 'SMPN 1 Padang'],
            ['nama_tempat' => 'SMPN 2 Padang'],
            ['nama_tempat' => 'SMPN 3 Padang'],
            ['nama_tempat' => 'SMPN 4 Padang'],
            ['nama_tempat' => 'SMPN 5 Padang'],
        ]);
    }
}
