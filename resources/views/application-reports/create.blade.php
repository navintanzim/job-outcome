<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Track My Application
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-2">
                        {{ $jobPosting->title }}
                    </h1>

                    <p class="text-gray-600 mb-6">
                        {{ $jobPosting->company->name }}
                    </p>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('application-reports.store', $jobPosting) }}"
                    >
                        @csrf

                        <div class="mb-6">
                            <label
                                for="applied_at"
                                class="block font-medium text-sm text-gray-700 mb-1"
                            >
                                Date Applied
                            </label>

                            <input
                                id="applied_at"
                                name="applied_at"
                                type="date"
                                value="{{ old('applied_at') }}"
                                class="block w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-6">
                            <label
                                for="status"
                                class="block font-medium text-sm text-gray-700 mb-1"
                            >
                                Current Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >
                                <option value="">Select a status</option>
                                <option value="applied" @selected(old('status') === 'applied')>
                                    Applied
                                </option>
                                <option value="recruiter_contacted" @selected(old('status') === 'recruiter_contacted')>
                                    Recruiter Contacted
                                </option>
                                <option value="interview" @selected(old('status') === 'interview')>
                                    Interview
                                </option>
                                <option value="offer" @selected(old('status') === 'offer')>
                                    Offer
                                </option>
                                <option value="hired" @selected(old('status') === 'hired')>
                                    Hired
                                </option>
                                <option value="rejected" @selected(old('status') === 'rejected')>
                                    Rejected
                                </option>
                                <option value="withdrawn" @selected(old('status') === 'withdrawn')>
                                    Withdrawn
                                </option>
                                <option value="no_response" @selected(old('status') === 'no_response')>
                                    No Response
                                </option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label
                                for="notes"
                                class="block font-medium text-sm text-gray-700 mb-1"
                            >
                                Notes <span class="text-gray-500">(optional)</span>
                            </label>

                            <textarea
                                id="notes"
                                name="notes"
                                rows="5"
                                class="block w-full border-gray-300 rounded-md shadow-sm"
                                placeholder="Anything you want to record about your application..."
                            >{{ old('notes') }}</textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                            >
                                Submit Application Report
                            </button>

                            <a
                                href="{{ route('job-postings.show', $jobPosting) }}"
                                class="text-gray-600 hover:underline"
                            >
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>