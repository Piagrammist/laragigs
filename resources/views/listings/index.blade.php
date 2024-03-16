<x-layout>
    @include('partials._hero')
    @include('partials._search')

    @unless(empty($listings))
        <div class="mx-4 gap-4 lg:grid lg:grid-cols-2">
            @foreach ($listings as $listing)
                <x-card>
                    <div class="flex">
                        <img class="mr-6 hidden w-48 md:block" alt="Company Logo"
                            src="{{ empty($listing->logo) ? asset('images/no-image.png') : asset('storage/' . $listing->logo) }}" />
                        <div>
                            <h3 class="text-2xl">
                                <a href="{{ route('listings.show', $listing->id) }}">
                                    {{ $listing->title }}
                                </a>
                            </h3>
                            <div class="mb-4 text-xl font-bold">{{ $listing->company }}</div>

                            <x-listing-tags csv="{{ $listing->tags }}" />

                            <div class="mt-4 text-lg">
                                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                            </div>
                        </div>
                    </div>
                </x-card>
            @endforeach
        </div>
        <div class="mt-6 p-4">
            {{ $listings->appends(request()->except('page'))->onEachSide(2)->links() }}
        </div>
    @else
        <p>No listings found!</p>
    @endunless
</x-layout>
