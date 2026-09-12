<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mjd_finances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mosque_id')->constrained('mjd_mosques')->cascadeOnDelete();
            $table->date('date');
            $table->enum('type', ['masuk', 'keluar']);
            $table->decimal('amount', 12, 2);
            $table->string('notes');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mjd_finances');
    }
};
