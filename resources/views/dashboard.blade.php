<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-2">
                        Welcome to JobOutcome
                    </h1>

                    <p class="text-gray-600 mb-8">
                        Track application outcomes and contribute to a
                        community-driven picture of what happens after people
                        apply to jobs.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <a
                            href="{{ route('companies.create') }}"
                            class="block p-6 border rounded-lg hover:bg-gray-50"
                        >
                            <h3 class="text-lg font-semibold mb-2">
                                Add a Company
                            </h3>

                            <p class="text-gray-600">
                                Add a company so its job postings can be
                                tracked.
                            </p>
                        </a>

                        <a
                            href="{{ route('job-postings.create') }}"
                            class="block p-6 border rounded-lg hover:bg-gray-50"
                        >
                            <h3 class="text-lg font-semibold mb-2">
                                Add a Job Posting
                            </h3>

                            <p class="text-gray-600">
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