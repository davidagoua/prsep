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
        Schema::create('rapport_annuels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('status')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('file')->nullable();
            $table->string('titre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapport_annuels');
    }
};
