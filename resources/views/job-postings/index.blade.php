<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold leading-tight text-[var(--ink)]">
            Job Postings
        </h2>
    </x-slot>

    <div class="py-10 sm:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="ui-panel">
                <div class="p-6 sm:p-8">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[var(--teal)]">Community board</p>
                            <h1 class="mt-1 text-3xl font-bold tracking-tight text-[var(--ink)]">
                                Job Postings
                            </h1>

                            <p class="mt-2 text-sm text-[var(--muted)]">
                                Browse job postings tracked by the JobOutcome community.
                            </p>
                        </div>

                        <a
                            href="{{ route('job-postings.create') }}"
                            class="ui-button whitespace-nowrap">
                            Add Job Posting
                        </a>
                    </div>

                    <form
                        method="GET"
                        action="{{ route('job-postings.index') }}"
                        class="mb-8">
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <input
                                type="text"
                                name="search"
                                value="{{ $search ?? '' }}"
                                placeholder="Search jobs, companies, or locations..."
                                class="ui-input mt-0 flex-1">

                            <button
                                type="submit"
                                class="ui-button">
                                Search
                            </button>

                            @if (!empty($search))
                            <a
                                href="{{ route('job-postings.index') }}"
                                class="ui-button-secondary">
                                Clear
                            </a>
                            @endif
                        </div>
                    </form>

                    @if ($jobPostings->isEmpty())
                    <div class="rounded-2xl border border-dashed border-[var(--line)] bg-slate-50 py-12 text-center text-[var(--muted)]">
                        No job postings have been added yet.
                    </div>
                    @else
                    <div class="space-y-4">
                        @foreach ($jobPostings as $jobPosting)
                        <div class="group rounded-2xl border border-[var(--line)] bg-white p-5 transition duration-200 hover:-translate-y-0.5 hover:border-orange-200 hover:shadow-md sm:p-6">
                            <div class="flex items-start justify-between gap-4">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        <a
                                            href="{{ route('job-postings.show', $jobPosting) }}"
                                            class="font-bold text-[var(--teal)] hover:text-[var(--coral)] hover:underline">
                                            {{ $jobPosting->title }}
                                        </a>
                                    </h3>

                                    <p class="mt-1 font-medium text-[var(--ink)]">
                                        {{ $jobPosting->company->name }}
                                    </p>

                                    <div class="mt-4 space-y-1 text-sm text-[var(--muted)]">
                                        @if ($jobPosting->location)
                                        <p>
                                            <strong>Location:</strong>
                                            {{ $jobPosting->location }}
                                        </p>
                                        @endif

                                        @if ($jobPosting->work_mode)
                                        <p>
                                            <strong>Work mode:</strong>
                                            {{ $jobPosting->work_mode }}
                                        </p>
                                        @endif

                                        @if ($jobPosting->employment_type)
                                        <p>
                                            <strong>Employment type:</strong>
                                            {{ $jobPosting->employment_type }}
                                        </p>
                                        @endif
                                    </div>
                                </div>

                                <span class="ui-badge bg-orange-100 text-orange-800">
                                    {{ ucfirst($jobPosting->status) }}
                                </span>

                            </div>

                            <div class="mt-4">
                                @if ($jobPosting->application_reports_exists)
                                    <span class="ui-badge bg-slate-100 text-slate-600">
                                    Application Tracked
                                </span>
                                @else
                                <a
                                    href="{{ route('application-reports.create', $jobPosting) }}"
                                    class="ui-button">
                                    Track My Application
                                </a>
                                @endif
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $jobPostings->links() }}
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>