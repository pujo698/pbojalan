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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Mobil::class);
            $table->string('nama')->nullable();
            $table->string('notlp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('lamapemesanan')->nullable();
            $table->date('tgl_pemesanan')->nullable();
            $table->string('total_pemesanan')->nullable();
            $table->enum('status', ['WAIT', 'PROSESSED','COMPLETED'])->nullable();
            $table->timestamps();
            $table->SoftDeletes('deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
