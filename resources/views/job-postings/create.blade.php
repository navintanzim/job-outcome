<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold leading-tight text-[var(--ink)]">
            {{ __('Add Job Posting') }}
        </h2>
    </x-slot>

    <div class="py-10 sm:py-14">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="ui-panel">
                <div class="p-6 sm:p-8">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-[var(--teal)]">Build the record</p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-[var(--ink)]">Add a job posting</h1>
                    <p class="mt-2 mb-8 text-sm leading-6 text-[var(--muted)]">Capture the details you will want when you review the outcome later.</p>

                    @if ($errors->any())
                        <div class="mb-6 rounded-md bg-red-50 p-4">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('job-postings.store') }}">
                        @csrf

                        <div class="mb-5">
                            <label for="company_id" class="ui-label">
                                Company
                            </label>

                            <select
                                id="company_id"
                                name="company_id"
                                required
                                class="ui-input"
                            >
                                <option value="">Select a company</option>

                                @foreach ($companies as $company)
                                    <option
                                        value="{{ $company->id }}"
                                        @selected(old('company_id') == $company->id)
                                    >
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="title" class="ui-label">
                                Job Title
                            </label>

                            <input
                                id="title"
                                name="title"
                                type="text"
                                value="{{ old('title') }}"
                                required
                                autofocus
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="original_url" class="ui-label">
                                Job URL
                            </label>

                            <input
                                id="original_url"
                                name="original_url"
                                type="url"
                                value="{{ old('original_url') }}"
                                placeholder="https://example.com/jobs/..."
                                required
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="source" class="ui-label">
                                Source
                            </label>

                            <input
                                id="source"
                                name="source"
                                type="text"
                                value="{{ old('source') }}"
                                placeholder="Company website, LinkedIn, Indeed, etc."
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="location" class="ui-label">
                                Location
                            </label>

                            <input
                                id="location"
                                name="location"
                                type="text"
                                value="{{ old('location') }}"
                                placeholder="Dhaka, Bangladesh"
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="work_mode" class="ui-label">
                                Work Mode
                            </label>

                            <select
                                id="work_mode"
                                name="work_mode"
                                class="ui-input"
                            >
                                <option value="">Select</option>
                                <option value="remote" @selected(old('work_mode') === 'remote')>
                                    Remote
                                </option>
                                <option value="hybrid" @selected(old('work_mode') === 'hybrid')>
                                    Hybrid
                                </option>
                                <option value="on-site" @selected(old('work_mode') === 'on-site')>
                                    On-site
                                </option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="employment_type" class="ui-label">
                                Employment Type
                            </label>

                            <select
                                id="employment_type"
                                name="employment_type"
                                class="ui-input"
                            >
                                <option value="">Select</option>
                                <option value="full-time" @selected(old('employment_type') === 'full-time')>
                                    Full-time
                                </option>
                                <option value="part-time" @selected(old('employment_type') === 'part-time')>
                                    Part-time
                                </option>
                                <option value="contract" @selected(old('employment_type') === 'contract')>
                                    Contract
                                </option>
                                <option value="internship" @selected(old('employment_type') === 'internship')>
                                    Internship
                                </option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="posted_at" class="ui-label">
                                Posted Date
                            </label>

                            <input
                                id="posted_at"
                                name="posted_at"
                                type="date"
                                value="{{ old('posted_at') }}"
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-7">
                            <label for="description" class="ui-label">
                                Job Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="8"
                                class="ui-input"
                            >{{ old('description') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="ui-button"
                        >
                            Add Job Posting
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>