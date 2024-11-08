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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nip', 18)->unique();
            $table->foreign('nip')->references('nip')->on('profiles')->onDelete('cascade');
            $table->string('golongan',5);
            $table->string('eselon',5);
            $table->string('jabatan');
            $table->string('tempat_tugas');
            $table->string('unit_kerja');
            $table->string('npwp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};