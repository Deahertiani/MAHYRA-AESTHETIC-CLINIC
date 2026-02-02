<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, drop the old JSON column
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn('masalah_kulit');
        });

        // Then, add it back as an ENUM (single value)
        Schema::table('pengguna', function (Blueprint $table) {
            $table->enum('masalah_kulit', [
                'bekas_jerawat',
                'komedo',
                'mata_panda',
                'kulit_kusam',
                'hiperpigmentasi',
                'kulit_kasar',
                'pori_besar',
                'kulit_sensitif',
                'keriput'
            ])->nullable()->after('warna_kulit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn('masalah_kulit');
        });

        Schema::table('pengguna', function (Blueprint $table) {
            $table->json('masalah_kulit')->nullable()->after('warna_kulit');
        });
    }
};
