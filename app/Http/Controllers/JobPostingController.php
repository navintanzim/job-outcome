<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $existingJob = JobPosting::where('company_id', $validated['company_id'])
            ->where('original_url', $validated['original_url'])
            ->first();

        if ($existingJob) {
            return redirect()
                ->route('job-postings.show', $existingJob)
                ->with('warning', 'This job posting already exists.');
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(8);
        $validated['first_seen_at'] = now();

        $jobPosting = JobPosting::create($validated);

        return redirect()
            ->route('job-postings.show', $jobPosting)
            ->with('success', 'Job posting created successfully.');
    }

    public function index(Request $request): View
    {
        $search = $request->input('search');

        $jobPostings = JobPosting::with('company')
            ->withExists([
                'applicationReports' => function ($query) use ($request) {
                    $query->where('user_id', $request->user()->id);
                },
            ])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('location', 'like', '%' . $search . '%')
                        ->orWhereHas('company', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('job-postings.index', compact('jobPostings', 'search'));
    }

    public function show(
        Request $request,
        JobPosting $jobPosting
    ): View {
        $statusCounts = $jobPosting->applicationReports()
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status');

        $applicationReport = $jobPosting->applicationReports()
            ->where('user_id', $request->user()->id)
            ->first();

        $totalApplications = $jobPosting->applicationReports()->count();

        return view('job-postings.show', compact(
            'jobPosting',
            'statusCounts',
            'applicationReport',
            'totalApplications'
        ));
    }
}