<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $jobPosting->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1 class="text-2xl font-bold mb-2">
                        {{ $jobPosting->title }}
                    </h1>

                    <p class="text-gray-600 mb-6">
                        {{ $jobPosting->company->name }}
                    </p>

                    @if ($jobPosting->location)
                        <p class="mb-2">
                            <strong>Location:</strong>
                            {{ $jobPosting->location }}
                        </p>
                    @endif

                    @if ($jobPosting->work_mode)
                        <p class="mb-2">
                            <strong>Work mode:</strong>
                            {{ $jobPosting->work_mode }}
                        </p>
                    @endif

                    @if ($jobPosting->employment_type)
                        <p class="mb-2">
                            <strong>Employment type:</strong>
                            {{ $jobPosting->employment_type }}
                        </p>
                    @endif

                    @if ($jobPosting->source)
                        <p class="mb-2">
                            <strong>Source:</strong>
                            {{ $jobPosting->source }}
                        </p>
                    @endif

                    @if ($jobPosting->posted_at)
                        <p class="mb-2">
                            <strong>Posted:</strong>
                            {{ $jobPosting->posted_at->format('F j, Y') }}
                        </p>
                    @endif

                    @if ($jobPosting->description)
                        <div class="mt-6">
                            <h3 class="font-semibold mb-2">
                                Job Description
                            </h3>

                            <div class="text-gray-700 whitespace-pre-line">
                                {{ $jobPosting->description }}
                            </div>
                        </div>
                    @endif


                    <div class="mt-6 flex items-center gap-4">
                        <a
                            href="{{ route('application-reports.create', $jobPosting) }}"
                            class="inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                        >
                            Report Your Application
                        </a>

                         <a
                            href="{{ $jobPosting->original_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-block px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                        >
                            View Original Job Posting
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>