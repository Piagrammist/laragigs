<x-layout>
    <x-card class="mx-auto mt-24 max-w-lg p-10">
        <header class="text-center">
            <h2 class="mb-1 text-2xl font-bold font-recursive uppercase">
                Create a Gig
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        <form action="{{ route('listings.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input name="company" label="Company Name" value="{{ old('company') }}"/>
                @error('company')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input name="title" label="Job Title" value="{{ old('title') }}"
                         placeholder="Example: Senior Laravel Developer"/>
                @error('title')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input name="location" label="Job Location" value="{{ old('location') }}"
                         placeholder="Example: Remote, Boston MA, etc."/>
                @error('location')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="email" name="email" label="Contact Email" value="{{ old('email') }}"/>
                @error('email')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="url" name="website" label="Website/Application URL" value="{{ old('website') }}"/>
                @error('website')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input name="tags" label="Tags (Comma Separated)" value="{{ old('tags') }}"
                         placeholder="Example: Laravel, Backend, Postgres, etc."/>
                @error('tags')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="file" name="logo" label="Company Logo"/>
            </div>

            <div>
                <x-input type="textarea" name="description" label="Job Description" value="{{ old('description') }}"
                         placeholder="Include tasks, requirements, salary, etc." />
                @error('description')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <button class="rounded bg-laravel px-4 py-2 text-white hover:bg-black">Create</button>
                <x-back-button class="ml-4" />
            </div>
        </form>
    </x-card>
</x-layout>
