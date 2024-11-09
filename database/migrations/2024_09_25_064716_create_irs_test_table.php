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
        Schema::create('irs_test', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('kodejadwal');
            $table->string('kodemk');
            $table->integer('prioritas')->default(0);
            $table->string('status');
            $table->string('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs_test');
    }
};
