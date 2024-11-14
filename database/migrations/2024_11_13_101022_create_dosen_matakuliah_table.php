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
        Schema::create('dosen_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('kodemk');

            $table->timestamps();

            
            $table->foreign('nip')->references('nip')->on('dosen')->onDelete('cascade');
            $table->foreign('kodemk')->references('kodemk')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_matakuliah');
    }
};
