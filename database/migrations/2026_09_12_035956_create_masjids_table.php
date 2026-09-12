<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masjids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'approved', 'banned'])->default('pending');
            $table->string('nama');
            $table->string('tahun_berdiri', 10);
            $table->text('alamat');
            $table->string('jenis');
            $table->string('status_tanah');
            $table->text('deskripsi');
            $table->string('nomor_telepon', 20)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masjids');
    }
};
