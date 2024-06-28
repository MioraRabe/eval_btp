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
        Schema::create('travauxes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nom');
            $table->foreignId('unite_id')->constrained()->onDelete('cascade');
            $table->decimal('pu', 14, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travauxes');
    }
};
