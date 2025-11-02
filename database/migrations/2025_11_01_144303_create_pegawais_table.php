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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->unique();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('npwp', 30)->nullable();
            $table->string('foto')->nullable();

            // Foreign keys
            $table->foreignId('agama_id')->constrained('agamas')->onDelete('restrict');
            $table->foreignId('golongan_id')->constrained('golongans')->onDelete('restrict');
            $table->foreignId('eselon_id')->constrained('eselons')->onDelete('restrict');
            $table->foreignId('jabatan_id')->constrained('jabatans')->onDelete('restrict');
            $table->foreignId('unit_kerja_id')->constrained('unit_kerjas')->onDelete('restrict');
            $table->foreignId('tempat_tugas_id')->constrained('tempat_tugas')->onDelete('restrict');
            
            // User yang membuat data (admin)
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
