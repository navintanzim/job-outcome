<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold leading-tight text-[var(--ink)]">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10 sm:py-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="relative overflow-hidden rounded-3xl bg-[var(--ink)] px-6 py-8 text-white shadow-xl sm:px-10 sm:py-10">
                <div class="absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[var(--coral)]/80 blur-3xl"></div>
                <div class="relative max-w-2xl">
                    <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-orange-200">Your job search workspace</p>
                    <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">Make every application count.</h1>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-slate-300 sm:text-base">
                        Keep the signal from your job search in one place, from the first posting you find to the outcome that follows.
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <div class="mb-5 flex items-end justify-between gap-4">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[var(--teal)]">Quick actions</p>
                        <h2 class="mt-1 text-2xl font-bold tracking-tight text-[var(--ink)]">Keep the momentum going</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        <a
                            href="{{ route('companies.create') }}"
                            class="ui-panel group block p-6 transition duration-200 hover:-translate-y-1 hover:border-orange-200 hover:shadow-lg"
                        >
                            <span class="mb-8 flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 text-lg text-[var(--coral)] transition group-hover:bg-[var(--coral)] group-hover:text-white">+</span>
                            <h3 class="text-lg font-bold text-[var(--ink)]">
                                Add a Company
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">
                                Add a company so its job postings can be
                                tracked.
                            </p>
                        </a>

                        <a
                            href="{{ route('job-postings.create') }}"
                            class="ui-panel group block p-6 transition duration-200 hover:-translate-y-1 hover:border-teal-200 hover:shadow-lg"
                        >
                            <span class="mb-8 flex h-11 w-11 items-center justify-center rounded-xl bg-teal-100 text-lg text-[var(--teal)] transition group-hover:bg-[var(--teal)] group-hover:text-white">&#8599;</span>
                            <h3 class="text-lg font-bold text-[var(--ink)]">
                                Add a Job Posting
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-[var(--muted)]">
                                Add a job posting that you or others can
                                report application outcomes for.
                            </p>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>