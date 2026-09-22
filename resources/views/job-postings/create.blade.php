<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Job Posting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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

                        <div class="mb-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-700">
                                Company
                            </label>

                            <select
                                id="company_id"
                                name="company_id"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
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

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">
                                Job Title
                            </label>

                            <input
                                id="title"
                                name="title"
                                type="text"
                                value="{{ old('title') }}"
                                required
                                autofocus
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="original_url" class="block text-sm font-medium text-gray-700">
                                Job URL
                            </label>

                            <input
                                id="original_url"
                                name="original_url"
                                type="url"
                                value="{{ old('original_url') }}"
                                placeholder="https://example.com/jobs/..."
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="source" class="block text-sm font-medium text-gray-700">
                                Source
                            </label>

                            <input
                                id="source"
                                name="source"
                                type="text"
                                value="{{ old('source') }}"
                                placeholder="Company website, LinkedIn, Indeed, etc."
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">
                                Location
                            </label>

                            <input
                                id="location"
                                name="location"
                                type="text"
                                value="{{ old('location') }}"
                                placeholder="Dhaka, Bangladesh"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="work_mode" class="block text-sm font-medium text-gray-700">
                                Work Mode
                            </label>

                            <select
                                id="work_mode"
                                name="work_mode"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
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

                        <div class="mb-4">
                            <label for="employment_type" class="block text-sm font-medium text-gray-700">
                                Employment Type
                            </label>

                            <select
                                id="employment_type"
                                name="employment_type"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
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

                        <div class="mb-4">
                            <label for="posted_at" class="block text-sm font-medium text-gray-700">
                                Posted Date
                            </label>

                            <input
                                id="posted_at"
                                name="posted_at"
                                type="date"
                                value="{{ old('posted_at') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Job Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="8"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >{{ old('description') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                        >
                            Add Job Posting
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>