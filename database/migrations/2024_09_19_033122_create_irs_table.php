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
        Schema::create('irs', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('mata_kuliah');
            $table->string('kelas');
            $table->integer('sks');
            $table->string('ruang');
            $table->string('status');
            $table->string('nama_dosen');
            $table->string('hari_jam');
            $table->integer('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};
