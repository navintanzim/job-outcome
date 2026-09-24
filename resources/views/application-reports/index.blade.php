<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold leading-tight text-[var(--ink)]">
            My Applications
        </h2>
    </x-slot>

    <div class="py-10 sm:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="ui-panel">
                <div class="p-6 sm:p-8">

                    @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="mb-8">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[var(--teal)]">Your activity</p>
                        <h1 class="mt-1 text-3xl font-bold tracking-tight text-[var(--ink)]">
                            My Applications
                        </h1>

                        <p class="mt-2 text-sm text-[var(--muted)]">
                            Track the jobs you have applied to and their current outcomes.
                        </p>
                    </div>

                    @if ($applications->isEmpty())
                    <div class="rounded-2xl border border-dashed border-[var(--line)] bg-slate-50 py-12 text-center">
                        <p class="mb-4 text-[var(--muted)]">
                            You haven't tracked any applications yet.
                        </p>

                        <a
                            href="{{ route('job-postings.index') }}"
                            class="ui-button">
                            Browse Job Postings
                        </a>
                    </div>
                    @else
                    <div class="space-y-4">

                        @foreach ($applications as $application)
                        <div class="rounded-2xl border border-[var(--line)] bg-white p-5 transition duration-200 hover:border-teal-200 hover:shadow-md sm:p-6">

                            <div class="flex items-start justify-between gap-4">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        <a
                                            href="{{ route('job-postings.show', $application->jobPosting) }}"
                                            class="font-bold text-[var(--teal)] hover:text-[var(--coral)] hover:underline">
                                            {{ $application->jobPosting->title }}
                                        </a>
                                    </h3>

                                    <p class="mt-1 font-medium text-[var(--ink)]">
                                        {{ $application->jobPosting->company->name }}
                                    </p>

                                    <div class="mt-4 space-y-1 text-sm text-[var(--muted)]">

                                        @if ($application->applied_at)
                                        <p>
                                            <strong>Applied:</strong>
                                            {{ $application->applied_at->format('F j, Y') }}
                                        </p>
                                        @endif

                                        @if ($application->status_changed_at)
                                        <p>
                                            <strong>Last updated:</strong>
                                            {{ $application->status_changed_at->format('F j, Y') }}
                                        </p>
                                        @endif

                                    </div>
                                </div>

                                <span class="ui-badge whitespace-nowrap bg-teal-100 text-teal-800">
                                    {{ ucwords(str_replace('_', ' ', $application->status)) }}
                                </span>

                            </div>

                            <div class="mt-4 flex items-center gap-3">

                                <a
                                    href="{{ route('application-reports.show', $application) }}"
                                    class="ui-button text-sm">
                                    View Application
                                </a>

                                <a
                                    href="{{ route('job-postings.show', $application->jobPosting) }}"
                                    class="ui-button-secondary text-sm">
                                    View Job Posting
                                </a>

                                <a
                                    href="{{ route('application-reports.edit', $application) }}"
                                    class="ui-button-secondary border-orange-200 text-sm text-[var(--coral-dark)] hover:bg-orange-50">
                                    Update Status
                                </a>

                            </div>

                        </div>
                        @endforeach

                    </div>

                    <div class="mt-6">
                        {{ $applications->links() }}
                    </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>