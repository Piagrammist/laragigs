<x-layout title="Sign In">
    <x-card class="mt-24 p-10 max-w-lg mx-auto">
        <header class="text-center">
            <h2 class="text-2xl font-bold font-recursive uppercase mb-1">Log In</h2>
            <p class="mb-4">Enter your account to post gigs</p>
        </header>

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <x-input type="email" name="email" label="E-mail" value="{{ old('email') }}"/>
                @error('email')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div>
                <x-input type="password" name="password" label="Password"/>
                @error('password')
                    <x-form-error>{{ $message }}</x-form-error>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="bg-laravel w-full text-white rounded py-2 px-4 transition ease-linear outline-none ring-offset-1 ring-laravel focus-visible:ring-2 hover:bg-black">
                    Sign Up
                </button>
            </div>

            <div class="mt-8 font-ubuntu text-center">
                <p>
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
