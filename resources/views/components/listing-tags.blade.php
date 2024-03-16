@props(['csv'])

@unless(empty($csv))
    <ul class="flex flex-wrap gap-1">
        @foreach(explode(',', $csv) as $tag)
            <li class="rounded-xl bg-black px-3 py-1 text-white">
                <a href="{{ route('listings.index') }}?tag={{ $tag }}">
                    {{ $tag }}
                </a>
            </li>
        @endforeach
    </ul>
@endunless
