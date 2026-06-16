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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lokasi');
            $table->foreign('id_lokasi')->references('id')->on('locations')->nullable();
            $table->string('no_ticket', 255)->nullable();
            $table->string('no_polisi', 255)->nullable();
            $table->foreignId('id_jenis')->nullable();
            $table->foreign('id_jenis')->references('id')->on('vehicle_types')->nullable();
            $table->date('masuk')->nullable();
            $table->date('keluar')->nullable();
            $table->integer('perjam_pertama')->nullable();
            $table->integer('perjam_berikutnya')->nullable();
            $table->integer('max_perhari')->nullable();
            $table->integer('total_jam')->nullable();
            $table->integer('total_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
