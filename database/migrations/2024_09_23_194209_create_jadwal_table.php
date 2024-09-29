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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('hari')->nullable();
            $table->string('jammulai')->nullable();
            $table->string('jamselesai')->nullable();
            $table->string('ruang')->nullable();
            $table->string('kodemk');
            $table->string('kelas')->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('prodi');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
