<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Application Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex items-start justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl font-bold">
                                {{ $applicationReport->jobPosting->title }}
                            </h1>

                            <p class="text-gray-700 mt-1">
                                {{ $applicationReport->jobPosting->company->name }}
                            </p>
                        </div>

                        <span class="px-3 py-1 text-sm rounded bg-gray-100 whitespace-nowrap">
                            {{ ucwords(str_replace('_', ' ', $applicationReport->status)) }}
                        </span>
                    </div>

                    <div class="border rounded-lg p-4 mb-8">
                        <h2 class="font-semibold text-lg mb-3">
                            Application Information
                        </h2>

                        <div class="text-sm text-gray-600 space-y-2">
                            @if ($applicationReport->applied_at)
                                <p>
                                    <strong>Applied:</strong>
                                    {{ $applicationReport->applied_at->format('F j, Y') }}
                                </p>
                            @endif

                            @if ($applicationReport->status_changed_at)
                                <p>
                                    <strong>Last updated:</strong>
                                    {{ $applicationReport->status_changed_at->format('F j, Y') }}
                                </p>
                            @endif

                            @if ($applicationReport->notes)
                                <p>
                                    <strong>Notes:</strong>
                                    {{ $applicationReport->notes }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h2 class="font-semibold text-lg mb-4">
                            Status History
                        </h2>

                        @if ($applicationReport->statusHistory->isEmpty())
                            <p class="text-gray-500">
                                No status history available.
                            </p>
                        @else
                            <div class="space-y-4">
                                @foreach ($applicationReport->statusHistory as $history)
                                    <div class="border-l-4 border-gray-300 pl-4">
                                        <p class="font-medium">
                                            {{ ucwords(str_replace('_', ' ', $history->status)) }}
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            {{ $history->occurred_at->format('F j, Y \a\t g:i A') }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 flex items-center gap-3">
                        <a
                            href="{{ route('application-reports.edit', $applicationReport) }}"
                            class="inline-block px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 text-sm font-medium"
                        >
                            Update Status
                        </a>

                        <a
                            href="{{ route('application-reports.index') }}"
                            class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 text-sm font-medium"
                        >
                            Back to My Applications
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>