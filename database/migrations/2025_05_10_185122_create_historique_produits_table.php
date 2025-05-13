<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_historique_produits_table.php
public function up()
{
    Schema::create('historique_produits', function (Blueprint $table) {
        $table->id();
        $table->foreignId('produit_id')->constrained()->onDelete('cascade');
        $table->string('action');
        $table->json('details')->nullable();
        $table->foreignId('user_id')->constrained();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_produits');
    }
};
