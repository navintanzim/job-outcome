<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Application
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-6">
                        <h1 class="text-2xl font-bold">
                            Update Application
                        </h1>

                        <p class="text-gray-600 mt-1">
                            {{ $applicationReport->jobPosting->title }}
                        </p>

                        <p class="text-gray-500">
                            {{ $applicationReport->jobPosting->company->name }}
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('application-reports.update', $applicationReport) }}"
                    >
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label
                                for="status"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                @foreach ([
                                    'applied',
                                    'recruiter_contacted',
                                    'interview',
                                    'offer',
                                    'hired',
                                    'rejected',
                                    'withdrawn',
                                    'no_response'
                                ] as $status)
                                    <option
                                        value="{{ $status }}"
                                        @selected(old('status', $applicationReport->status) === $status)
                                    >
                                        {{ ucwords(str_replace('_', ' ', $status)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label
                                for="notes"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Notes
                            </label>

                            <textarea
                                id="notes"
                                name="notes"
                                rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >{{ old('notes', $applicationReport->notes) }}</textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700"
                            >
                                Update Application
                            </button>

                            <a
                                href="{{ route('application-reports.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300"
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