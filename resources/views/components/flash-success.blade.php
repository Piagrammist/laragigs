@if (session()->has('success'))
    <div x-data="{ visible: true }" x-show="visible" x-init="setTimeout(() => (visible = false), 3000)"
        class="duration:200 fixed left-1/2 top-1 -translate-x-1/2 rounded-sm bg-laravel px-36 py-4 text-white shadow-md transition-all hover:px-48">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
