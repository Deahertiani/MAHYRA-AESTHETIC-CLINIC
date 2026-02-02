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
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->enum('pengirim', ['user', 'bot'])->default('user')->after('id_pengguna');
            $table->text('pesan')->after('pengirim');
        });

        // Remove the old 'pertanyaan' column if it exists
        Schema::table('konsultasi', function (Blueprint $table) {
            if (Schema::hasColumn('konsultasi', 'pertanyaan')) {
                $table->dropColumn('pertanyaan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->dropColumn(['pengirim', 'pesan']);
            $table->text('pertanyaan')->nullable();
        });
    }
};
