<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class JobPostingController extends Controller
{
    public function create(): View
    {
        $companies = Company::orderBy('name')->get();

        return view('job-postings.create', compact('companies'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_id' => ['required', 'exists:companies,id'],
            'title' => ['required', 'string', 'max:255'],
            'original_url' => ['required', 'url', 'max:2048'],
            'source' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:255'],
            'work_mode' => ['nullable', 'string', 'max:50'],
            'employment_type' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'posted_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(8);
        $validated['first_seen_at'] = now();

        $jobPosting = JobPosting::create($validated);

        return redirect()
            ->route('job-postings.show', $jobPosting)
            ->with('success', 'Job posting created successfully.');
    }

    public function index(Request $request): View
    {
        $jobPostings = JobPosting::with('company')
            ->withExists([
                'applicationReports' => function ($query) use ($request) {
                    $query->where('user_id', $request->user()->id);
                },
            ])
            ->latest()
            ->paginate(20);

        return view('job-postings.index', compact('jobPostings'));
    }

    public function show(JobPosting $jobPosting): View
    {
        return view('job-postings.show', compact('jobPosting'));
    }
}