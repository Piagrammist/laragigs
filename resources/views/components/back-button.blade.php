@props(['icon' => null])

<a href="{{ route('listings.index') }}" {{ $attributes->merge(['class' => "text-black"]) }}>
    @if($icon)
        <i class="fa-solid fa-arrow-left"></i>
    @endif
    Back
</a>
