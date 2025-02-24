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
        Schema::create('analyse_equites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('categorie');
            $table->longText('description')->nullable();
            $table->longText('cause')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyse_equites');
    }
};
