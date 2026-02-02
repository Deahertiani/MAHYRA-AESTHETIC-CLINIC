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
        // Add columns to reservasi table
        Schema::table('reservasi', function (Blueprint $table) {
            $table->string('nama_perawatan')->after('id_dokter');
            $table->integer('harga')->default(0)->after('nama_perawatan');
            $table->date('tanggal')->after('harga');
            $table->string('waktu')->after('tanggal');
            $table->enum('status', ['menunggu', 'dikonfirmasi', 'selesai', 'dibatalkan'])->default('menunggu')->after('waktu');
            $table->string('nama_pelanggan')->after('status');
            $table->string('email_pelanggan')->after('nama_pelanggan');
            $table->string('telepon_pelanggan')->after('email_pelanggan');
        });

        // Make id_layanan and id_dokter nullable since we store the treatment name directly
        Schema::table('reservasi', function (Blueprint $table) {
            $table->foreignId('id_layanan')->nullable()->change();
            $table->foreignId('id_dokter')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservasi', function (Blueprint $table) {
            $table->dropColumn([
                'nama_perawatan',
                'harga',
                'tanggal',
                'waktu',
                'status',
                'nama_pelanggan',
                'email_pelanggan',
                'telepon_pelanggan'
            ]);
        });
    }
};
