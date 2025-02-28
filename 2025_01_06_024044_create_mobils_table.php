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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('nomorpolisi')->nullable();
            $table->enum('jenis',['avanza', 'ayla', 'toyota'])->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('harga')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
            $table->SoftDeletes('deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
