<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'original_url',
        'source',
        'location',
        'work_mode',
        'employment_type',
        'description',
        'posted_at',
        'first_seen_at',
        'last_seen_at',
        'closed_at',
        'status',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'first_seen_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applicationReports(): HasMany
    {
        return $this->hasMany(ApplicationReport::class);
    }

    public function jobReports(): HasMany
    {
        return $this->hasMany(JobReport::class);
    }
}