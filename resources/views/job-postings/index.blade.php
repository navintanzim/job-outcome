<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job Postings
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold">
                                Job Postings
                            </h1>

                            <p class="text-gray-600 mt-1">
                                Browse job postings tracked by the JobOutcome community.
                            </p>
                        </div>

                        <a
                            href="{{ route('job-postings.create') }}"
                            class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                        >
                            Add Job Posting
                        </a>
                    </div>

                    @if ($jobPostings->isEmpty())
                        <div class="py-8 text-center text-gray-500">
                            No job postings have been added yet.
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach ($jobPostings as $jobPosting)
                                <div class="border rounded-lg p-5">
                                    <div class="flex items-start justify-between gap-4">

                                        <div>
                                            <h3 class="text-lg font-semibold">
                                                <a
                                                    href="{{ route('job-postings.show', $jobPosting) }}"
                                                    class="text-blue-600 hover:underline"
                                                >
                                                    {{ $jobPosting->title }}
                                                </a>
                                            </h3>

                                            <p class="text-gray-700 mt-1">
                                                {{ $jobPosting->company->name }}
                                            </p>

                                            <div class="mt-3 text-sm text-gray-600 space-y-1">
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

                                        <span class="px-3 py-1 text-sm rounded bg-gray-100">
                                            {{ ucfirst($jobPosting->status) }}
                                        </span>

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