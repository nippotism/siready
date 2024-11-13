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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->string('prodi');
            $table->string('jalur_masuk');
            $table->year('angkatan');
            $table->integer('semester_berjalan');
            $table->float('ipk');
            $table->string('nip_doswal');
            $table->text('alamat')->nullable();
            $table->string('status')->nullable();
            $table->string('akses_irs')->default('yes');    
            $table->timestamps();


            $table->foreign('nip_doswal')->references('nip')->on('dosen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
