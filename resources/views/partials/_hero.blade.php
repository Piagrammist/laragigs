<section class="flex flex-col justify-center align-center relative mb-4 h-72 space-y-4 bg-laravel text-center">
    <div class="absolute left-0 top-0 size-full bg-center bg-no-repeat opacity-10"
        style="background-image: url('{{ asset('images/laravel-logo.png') }}')">
    </div>

    <div class="z-10">
        <h1 class="text-6xl font-bold font-recursive uppercase text-white">
            Lara<span class="text-black">Gigs</span>
        </h1>
        <p class="my-4 text-2xl font-bold text-gray-200">
            Find or post Laravel jobs & projects
        </p>
        <div>
            <a href="{{ route('register') }}"
                class="mt-2 inline-block rounded-md border-2 border-white px-4 py-2 uppercase text-white transition duration-300 hover:border-black hover:text-black">
                Sign Up to List a Gig
            </a>
        </div>
    </div>
</section>
