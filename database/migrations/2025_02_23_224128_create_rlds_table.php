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
        Schema::create('rlds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('ild_id');
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->date('date_debut')->nullable();
            $table->unsignedInteger('ptba_id')->nullable();
            $table->date('date_fin')->nullable();
            $table->longText('description')->nullable();
            $table->longText('titre')->nullable();
            $table->longText('categorie')->nullable();
            $table->longText('zone')->nullable();
            $table->longText('cible')->nullable();
            $table->date('delai_verification')->nullable();
            $table->longText('source')->nullable();
            $table->longText('methodologie_verification')->nullable();
            $table->json('data')->nullable();
            $table->unsignedBigInteger('montant')->nullable();
            $table->longText('unite')->nullable();
            $table->json('drf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rlds');
    }
};
