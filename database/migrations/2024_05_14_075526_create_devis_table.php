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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->dateTime('datecreation')->default(now());
            $table->foreignId('typemaison_id')->constrained()->onDelete('cascade');
            $table->foreignId('typefinition_id')->constrained()->onDelete('cascade');
            $table->decimal('augmentation', 5, 2);
            $table->dateTime('datedebuttravaux');
            $table->foreignId('lieu_id')->constrained()->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
