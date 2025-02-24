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
        Schema::create('ilds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('titre')->nullable();
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('ptba_id')->nullable();
            $table->unsignedBigInteger('composante_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ilds');
    }
};
