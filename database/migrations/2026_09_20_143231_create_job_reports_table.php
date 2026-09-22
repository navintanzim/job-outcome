<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('job_posting_id')
                ->constrained('job_postings')
                ->cascadeOnDelete();
            $table->string('type', 50);
            $table->text('description')->nullable();
            $table->string('status', 50)->default('pending');
            $table->timestamps();
            $table->index('user_id');
            $table->index('job_posting_id');
            $table->index(['job_posting_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_reports');
    }
};