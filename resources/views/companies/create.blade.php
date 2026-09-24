<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-bold leading-tight text-[var(--ink)]">
            {{ __('Add Company') }}
        </h2>
    </x-slot>

    <div class="py-10 sm:py-14">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="ui-panel">
                <div class="p-6 sm:p-8">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-[var(--teal)]">Grow the directory</p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-[var(--ink)]">Add a company</h1>
                    <p class="mt-2 mb-8 text-sm leading-6 text-[var(--muted)]">Create a home for the roles and application outcomes you discover.</p>

                    @if ($errors->any())
                        <div class="mb-6 rounded-md bg-red-50 p-4">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('companies.store') }}">
                        @csrf

                        <div class="mb-5">
                            <label for="name" class="ui-label">
                                Company Name
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="website_url" class="ui-label">
                                Website URL
                            </label>

                            <input
                                id="website_url"
                                name="website_url"
                                type="url"
                                value="{{ old('website_url') }}"
                                placeholder="https://example.com"
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-5">
                            <label for="logo_url" class="ui-label">
                                Logo URL
                            </label>

                            <input
                                id="logo_url"
                                name="logo_url"
                                type="url"
                                value="{{ old('logo_url') }}"
                                placeholder="https://example.com/logo.png"
                                class="ui-input"
                            >
                        </div>

                        <div class="mb-7">
                            <label for="description" class="ui-label">
                                Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                class="ui-input"
                            >{{ old('description') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="ui-button"
                        >
                            Add Company
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>