<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-4">
                        {{ $company->name }}
                    </h1>

                    @if ($company->website_url)
                        <p class="mb-4">
                            <a
                                href="{{ $company->website_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-blue-600 hover:underline"
                            >
                                {{ $company->website_url }}
                            </a>
                        </p>
                    @endif

                    @if ($company->description)
                        <div class="mb-6">
                            <h3 class="font-semibold mb-2">About</h3>

                            <p class="text-gray-700 whitespace-pre-line">
                                {{ $company->description }}
                            </p>
                        </div>
                    @endif

                    <div class="mt-6">
                        <h3 class="font-semibold mb-2">Job Postings</h3>

                        @if ($company->jobPostings->isEmpty())
                            <p class="text-gray-500">
                                No job postings have been added yet.
                            </p>
                        @else
                            <ul class="list-disc list-inside">
                                @foreach ($company->jobPostings as $jobPosting)
                                    <li>
                                        {{ $jobPosting->title }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>