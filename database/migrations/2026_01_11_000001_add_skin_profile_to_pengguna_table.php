<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->enum('jenis_kulit', ['kering', 'normal', 'berminyak', 'kombinasi', 'berjerawat'])->nullable()->after('foto_profil');
            $table->enum('warna_kulit', ['terang', 'sedang', 'gelap'])->nullable()->after('jenis_kulit');
            $table->json('masalah_kulit')->nullable()->after('warna_kulit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn(['jenis_kulit', 'warna_kulit', 'masalah_kulit']);
        });
    }
};
