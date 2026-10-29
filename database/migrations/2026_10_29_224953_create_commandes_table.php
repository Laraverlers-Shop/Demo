<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id('code_commande');
            $table->foreignId('code_client')->constrained('clients', 'code_client')->onDelete('cascade');
            $table->date('date_commande');
            $table->decimal('montant_total', 10, 2);
            $table->string('bon_commande')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};