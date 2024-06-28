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
        Schema::create('devisdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devis_id')->constrained()->onDelete('cascade');
            $table->foreignId('travaux_id')->constrained()->onDelete('cascade');
            $table->decimal('quantite', 8, 2)->default(0);
            $table->decimal('pu', 14, 2)->default(0);
            $table->decimal('montant', 14, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devisdetails');
    }
};
