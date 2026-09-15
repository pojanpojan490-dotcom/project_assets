<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyusutans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset');
            $table->decimal('harga_perolehan', 15, 2);
            $table->integer('umur_ekonomis');
            $table->decimal('nilai_penyusutan', 15, 2);
            $table->decimal('nilai_buku', 15, 2);
            $table->date('tanggal_penyusutan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyusutans');
    }
};