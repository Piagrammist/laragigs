<x-layout>
    @include('partials._search')

    <x-back-button class="mb-4 ml-4 inline-block" icon />
    <div class="mx-4">
        <x-card class="flex flex-col items-center justify-center p-10 text-center">
            <img class="mb-6 mr-6 w-48" alt="Company Logo"
                src="{{ empty($listing->logo) ? asset('images/no-image.png') : asset('storage/' . $listing->logo) }}" />

            <h3 class="mb-2 text-2xl">{{ $listing->title }}</h3>
            <div class="mb-4 text-xl font-bold">{{ $listing->company }}</div>

            <x-listing-tags csv="{{ $listing->tags }}" />

            <div class="my-4 text-lg">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
            {{-- End of upper part --}}
            <div class="mb-6 w-full border border-gray-200"></div>
            <div class="w-full">
                <h3 class="mb-4 text-3xl font-bold">
                    Job Description
                </h3>
                <div class="space-y-4 text-lg">
                    <p>{{ $listing->description }}</p>

                    <div class="mt-6 flex justify-center items-center gap-20">
                        <a href="mailto:{{ $listing->email }}"
                           class="flex-[0_0_25%] rounded-md bg-laravel px-6 py-2 text-white transition hover:opacity-80">
                            <i class="fa-solid fa-envelope"></i> Contact Employer
                        </a>
                        <a href="{{ $listing->website }}" target="_blank"
                           class="flex-[0_0_25%] rounded-md bg-black px-6 py-2 text-white transition hover:opacity-80">
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
            </div>
            @auth
                <div class="w-full mt-4 flex justify-center items-center gap-20">
                    <a href="{{ route('listings.edit', $listing->id) }}"
                       class="flex-[0_0_25%] rounded-md bg-black px-6 py-2 text-white transition hover:opacity-80">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>

                    <form action="{{ route('listings.delete', $listing->id) }}" method="POST" class="inline-block flex-[0_0_25%]">
                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Proceed to delete the post?')"
                                class="w-full inline-block rounded-md bg-laravel py-2 px-6 text-white transition hover:opacity-80">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            @endauth
        </x-card>
    </div>
</x-layout>
