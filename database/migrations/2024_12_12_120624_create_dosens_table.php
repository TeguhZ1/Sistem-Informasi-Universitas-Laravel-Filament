<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 18)->unique();
            $table->string('nama', 128);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 128);
            $table->date('tanggal_lahir');
            $table->string('bidang_keahlian');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
