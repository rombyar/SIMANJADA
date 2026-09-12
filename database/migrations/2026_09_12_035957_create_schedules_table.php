<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mjd_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mosque_id')->constrained('mjd_mosques')->cascadeOnDelete();
            $table->string('name');
            $table->text('description');
            $table->string('place');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mjd_schedules');
    }
};
