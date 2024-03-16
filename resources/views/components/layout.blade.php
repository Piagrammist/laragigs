@props(['title' => 'LaraGigs | Find Laravel Jobs & Projects'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Recursive:wght@300..1000&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>{{ $title }}</title>
</head>

<body class="mb-24">
    <nav class="mb-4 flex items-center justify-between">
        <a href="{{ route('listings.index') }}">
            <img class="w-24" src="{{ asset('images/logo.png') }}" alt="Logo"/>
        </a>
        <ul class="mr-6 flex space-x-6 text-lg">
            @auth
                <li>
                    <span class="font-bold">
                        Welcome, {{ auth()->user()->name }}!
                    </span>
                </li>
                <li>
                    <a href="{{ route('listings.manage') }}" class="transition hover:text-laravel">
                        <i class="fa-solid fa-gear"></i> Manage Listings
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('register') }}" class="transition hover:text-laravel">
                        <i class="fa-solid fa-user-plus"></i> Register
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="transition hover:text-laravel">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                    </a>
                </li>
            @endauth
        </ul>
    </nav>
    <main>{{ $slot }}</main>
    <footer
        class="fixed bottom-0 left-0 right-0 mt-24 h-16 bg-laravel text-white font-bold flex items-center justify-center opacity-90">
        <p class="ml-2">Copyright &copy; {{ date('Y') }}, All Rights reserved</p>

        <a href="{{ route('listings.create') }}"
           class="hidden px-5 py-2 rounded bg-black absolute right-10 top-1/2 -translate-y-1/2 sm:inline-block">
            Post Job
        </a>
    </footer>
    <x-flash-success/>
</body>
</html>
