<?php

namespace App\Http\Controllers;

use App\Models\ApplicationReport;
use App\Models\JobPosting;
use App\Models\ApplicationStatusHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationReportController extends Controller
{

    public function index(Request $request): View
    {
        $applications = ApplicationReport::with('jobPosting.company')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(20);

        return view('application-reports.index', compact('applications'));
    }

    public function create(
        Request $request,
        JobPosting $jobPosting
    ): View|RedirectResponse {
        $existingApplication = $jobPosting->applicationReports()
            ->where('user_id', $request->user()->id)
            ->first();

        if ($existingApplication) {
            return redirect()
                ->route('application-reports.show', $existingApplication);
        }

        return view('application-reports.create', compact('jobPosting'));
    }

    public function store(Request $request, JobPosting $jobPosting): RedirectResponse {
        $validated = $request->validate([
            'applied_at' => ['nullable', 'date'],
            'status' => [
                'required',
                'string',
                'in:' . implode(',', ApplicationReport::STATUSES),
            ],
            'notes' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = $request->user()->id;
        $validated['job_posting_id'] = $jobPosting->id;
        $validated['status_changed_at'] = now();

        DB::transaction(function () use ($validated) {
            $applicationReport = ApplicationReport::create($validated);

            ApplicationStatusHistory::create([
                'application_report_id' => $applicationReport->id,
                'status' => 'applied',
                'occurred_at' => $applicationReport->created_at,
            ]);
        });

        return redirect()
            ->route('job-postings.show', $jobPosting)
            ->with('success', 'Application report submitted successfully.');
    }

    public function edit( Request $request,ApplicationReport $applicationReport): View {
        abort_unless(
            $applicationReport->user_id === $request->user()->id,
            403
        );

        return view('application-reports.edit', compact('applicationReport'));
    }

    public function update(Request $request,ApplicationReport $applicationReport): RedirectResponse {
        abort_unless(
            $applicationReport->user_id === $request->user()->id,
            403
        );

        $validated = $request->validate([
            'status' => [
                'required',
                'string',
                'in:' . implode(',', ApplicationReport::STATUSES),
            ],
            'notes' => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($applicationReport, $validated) {
            $applicationReport->update([
                'status' => $validated['status'],
                'status_changed_at' => now(),
                'notes' => $validated['notes'] ?? null,
            ]);

            $alreadyReached = $applicationReport->statusHistory()
                ->where('status', $validated['status'])
                ->exists();

            if (! $alreadyReached) {
                ApplicationStatusHistory::create([
                    'application_report_id' => $applicationReport->id,
                    'status' => $validated['status'],
                    'occurred_at' => $applicationReport->status_changed_at,
                ]);
            }
        });

        return redirect()
            ->route('application-reports.index')
            ->with('success', 'Application status updated successfully.');
    }

    public function show(
        Request $request,
        ApplicationReport $applicationReport
    ): View {
        abort_unless(
            $applicationReport->user_id === $request->user()->id,
            403
        );

        $applicationReport->load([
            'jobPosting.company',
            'statusHistory' => function ($query) {
                $query->latest('occurred_at');
            },
        ]);

        return view(
            'application-reports.show',
            compact('applicationReport')
        );
    }
}