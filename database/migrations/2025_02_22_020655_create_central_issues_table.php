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
        Schema::create('central_issues', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('description')->nullable();
            $table->string('issue_type')->nullable();
            $table->string('issue_status')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('central_issues');
    }
};
