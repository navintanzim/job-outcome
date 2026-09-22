<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')
                ->constrained('companies')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('original_url', 2048);
            $table->string('source', 100)->nullable();
            $table->string('location')->nullable();
            $table->string('work_mode', 50)->nullable();
            $table->string('employment_type', 100)->nullable();
            $table->longText('description')->nullable();
            $table->timestamp('posted_at')->nullable();
            $table->timestamp('first_seen_at');
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->string('status', 50)->default('active');
            $table->timestamps();
            $table->index('company_id');
            $table->index('status');
            $table->index('first_seen_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};