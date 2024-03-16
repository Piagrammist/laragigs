<x-layout>
    <x-card class="mx-auto mt-24 max-w-lg p-10">
        <header class="text-center">
            <h2 class="mb-1 text-2xl font-bold font-recursive uppercase">
                Edit Gig
            </h2>
        </header>

        <form action="{{ route('listings.update', $listing->id) }}" method="POST" class="space-y-6"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <x-input name="company" label="Company Name"
                                 value="{{ old('company') ?: $listing->company }}"/>
                @error('company')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input name="title" label="Job Title"
                                 value="{{ old('title') ?: $listing->title }}"
                                 placeholder="Example: Senior Laravel Developer"/>
                @error('title')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input name="location" label="Job Location"
                                 value="{{ old('location') ?: $listing->location }}"
                                 placeholder="Example: Remote, Boston MA, etc."/>
                @error('location')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="email" name="email" label="Contact Email"
                                 value="{{ old('email') ?: $listing->email }}"/>
                @error('email')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="url" name="website" label="Website/Application URL"
                                 value="{{ old('website') ?: $listing->website }}"/>
                @error('website')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input name="tags" label="Tags (Comma Separated)"
                           value="{{ old('tags') ?: str_replace(',', ', ', $listing->tags) }}"
                           placeholder="Example: Laravel, Backend, Postgres, etc."/>
                @error('tags')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="file" name="logo" label="Company Logo"/>
                @unless(empty($listing->logo))
                    <img class="hidden md:block max-h-36 mt-1 ml-1 rounded-sm" alt="Company Logo"
                         src="{{ asset('storage/' . $listing->logo) }}"/>
                @endunless
            </div>

            <div>
                <x-input type="textarea" name="description" label="Job Description"
                         value="{{ old('description') ?: $listing->description }}"
                         placeholder="Include tasks, requirements, salary, etc." />
                @error('description')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <button class="rounded bg-laravel px-4 py-2 text-white transition hover:bg-black">Edit</button>
                <x-back-button class="ml-1 px-4 py-2"/>
            </div>
        </form>
    </x-card>
</x-layout>
