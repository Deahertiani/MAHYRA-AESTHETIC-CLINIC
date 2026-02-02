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
            $table->string('nama_depan')->nullable()->after('nama');
            $table->string('nama_belakang')->nullable()->after('nama_depan');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama_belakang');
            $table->string('telepon')->nullable()->after('jenis_kelamin');
            $table->text('alamat')->nullable()->after('telepon');
            $table->string('foto_profil')->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn(['nama_depan', 'nama_belakang', 'jenis_kelamin', 'telepon', 'alamat', 'foto_profil']);
        });
    }
};
