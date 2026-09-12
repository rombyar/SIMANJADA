<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mjd_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mosque_id')->constrained('mjd_mosques')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mjd_activities');
    }
};
