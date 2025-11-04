<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // ======== Agama ========
        $agamas = [
            ['nama_agama' => 'Islam'],
            ['nama_agama' => 'Kristen'],
            ['nama_agama' => 'Katolik'],
            ['nama_agama' => 'Hindu'],
            ['nama_agama' => 'Buddha'],
        ];
        DB::table('agamas')->insert($agamas);

        // ======== Golongan ========
        $golongans = [
            ['nama_golongan' => 'II/a'],
            ['nama_golongan' => 'II/b'],
            ['nama_golongan' => 'III/a'],
            ['nama_golongan' => 'III/b'],
            ['nama_golongan' => 'IV/a'],
            ['nama_golongan' => 'IV/b'],
        ];
        DB::table('golongans')->insert($golongans);

        // ======== Eselon ========
        $eselons = [
            ['nama_eselon' => 'I'],
            ['nama_eselon' => 'II'],
            ['nama_eselon' => 'III'],
            ['nama_eselon' => 'IV'],
            ['nama_eselon' => 'V'],
        ];
        DB::table('eselons')->insert($eselons);

        // ======== Jabatan ========
        $jabatans = [
            ['nama_jabatan' => 'Kepala Bagian Umum'],
            ['nama_jabatan' => 'Analis Kepegawaian Ahli Muda'],
            ['nama_jabatan' => 'Pranata Komputer Ahli Pertama'],
            ['nama_jabatan' => 'Perencana Ahli Muda'],
            ['nama_jabatan' => 'Bendahara Pengeluaran'],
            ['nama_jabatan' => 'Staf Administrasi'],
            ['nama_jabatan' => 'Analis Data dan Informasi'],
            ['nama_jabatan' => 'Pengelola Barang Milik Negara'],
            ['nama_jabatan' => 'Sekretaris'],
            ['nama_jabatan' => 'Kepala Subbagian Keuangan'],
        ];
        DB::table('jabatans')->insert($jabatans);

        // ======== Unit Kerja (sesuai instansi pemerintah, bukan sekolah) ========
        $unitKerjas = [
            ['nama_unit' => 'Sekretariat Jenderal'],
            ['nama_unit' => 'Biro Kepegawaian'],
            ['nama_unit' => 'Biro Hukum dan Organisasi'],
            ['nama_unit' => 'Biro Perencanaan dan Keuangan'],
            ['nama_unit' => 'Direktorat Sistem Informasi'],
            ['nama_unit' => 'Direktorat Pelayanan Publik'],
            ['nama_unit' => 'Direktorat Pendidikan dan Pelatihan'],
            ['nama_unit' => 'Inspektorat Utama'],
            ['nama_unit' => 'Pusat Data dan Statistik'],
            ['nama_unit' => 'Bagian Umum dan Rumah Tangga'],
        ];
        DB::table('unit_kerjas')->insert($unitKerjas);

        // ======== Tempat Tugas (kota-kota besar) ========
        $tempatTugas = [
            ['nama_tempat' => 'Jakarta'],
            ['nama_tempat' => 'Bandung'],
            ['nama_tempat' => 'Surabaya'],
            ['nama_tempat' => 'Medan'],
            ['nama_tempat' => 'Yogyakarta'],
            ['nama_tempat' => 'Semarang'],
            ['nama_tempat' => 'Palembang'],
            ['nama_tempat' => 'Makassar'],
            ['nama_tempat' => 'Denpasar'],
            ['nama_tempat' => 'Balikpapan'],
        ];
        DB::table('tempat_tugas')->insert($tempatTugas);
    }
}
