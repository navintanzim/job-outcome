<?php

namespace App\Http\Controllers;

use App\Models\ApplicationReport;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationReportController extends Controller
{
    public function create(JobPosting $jobPosting): View
    {
        return view('application-reports.create', compact('jobPosting'));
    }

    public function store(
        Request $request,
        JobPosting $jobPosting
    ): RedirectResponse {
        $validated = $request->validate([
            'applied_at' => ['nullable', 'date'],
            'status' => ['required', 'string', 'max:50'],
            'notes' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = $request->user()->id;
        $validated['job_posting_id'] = $jobPosting->id;
        $validated['status_changed_at'] = now();

        $applicationReport = ApplicationReport::create($validated);

        return redirect()
            ->route('job-postings.show', $jobPosting)
            ->with('success', 'Application report submitted successfully.');
    }
}