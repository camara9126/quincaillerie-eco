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
        Schema::create('mouvement_tiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tiers_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['vente', 'achat', 'paiement', 'compensation']);
            $table->decimal('montant', 12, 2);
            $table->enum('sens', ['debit', 'credit','neutre']);
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('reference_type')->nullable();
            $table->text('description')->nullable();
            $table->date('date_operation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvement_tiers');
    }
};
