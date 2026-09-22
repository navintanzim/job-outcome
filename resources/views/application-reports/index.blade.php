<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Applications
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="mb-6">
                        <h1 class="text-2xl font-bold">
                            My Applications
                        </h1>

                        <p class="text-gray-600 mt-1">
                            Track the jobs you have applied to and their current outcomes.
                        </p>
                    </div>

                    @if ($applications->isEmpty())
                    <div class="py-8 text-center">
                        <p class="text-gray-500 mb-4">
                            You haven't tracked any applications yet.
                        </p>

                        <a
                            href="{{ route('job-postings.index') }}"
                            class="inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                            Browse Job Postings
                        </a>
                    </div>
                    @else
                    <div class="space-y-4">

                        @foreach ($applications as $application)
                        <div class="border rounded-lg p-5">

                            <div class="flex items-start justify-between gap-4">

                                <div>
                                    <h3 class="text-lg font-semibold">
                                        <a
                                            href="{{ route('job-postings.show', $application->jobPosting) }}"
                                            class="text-blue-600 hover:underline">
                                            {{ $application->jobPosting->title }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-700 mt-1">
                                        {{ $application->jobPosting->company->name }}
                                    </p>

                                    <div class="mt-3 text-sm text-gray-600 space-y-1">

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

                                <span class="px-3 py-1 text-sm rounded bg-gray-100 whitespace-nowrap">
                                    {{ ucwords(str_replace('_', ' ', $application->status)) }}
                                </span>

                            </div>

                            <div class="mt-4 flex items-center gap-3">

                                <a
                                    href="{{ route('application-reports.show', $application) }}"
                                    class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 text-sm font-medium">
                                    View Application
                                </a>

                                <a
                                    href="{{ route('job-postings.show', $application->jobPosting) }}"
                                    class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm font-medium">
                                    View Job Posting
                                </a>

                                <a
                                    href="{{ route('application-reports.edit', $application) }}"
                                    class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 text-sm font-medium">
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