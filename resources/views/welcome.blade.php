<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rosarivo:ital@0;1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap CSS files -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" />
        @vite(['resources/js/app.js', 'resources/css/defaults.css'])

        <!-- Main CSS files -->

    </head>

    <body>
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <div class="container">
            <h3 class="text-center">Whereas disregard and contempt for human rights have resulted </h3>
            <h1 class="text-center">Welcome to laravel development</h1>
            <p class="text-center">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa sequi molestias earum quos necessitatibus maxime debitis facilis veritatis. Tempore animi quisquam, aspernatur voluptatum expedita rerum consequuntur a? Repellat, odit nobis.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi dolore porro voluptas cum quos maxime quas, sit minima necessitatibus nihil eius eveniet odit quam quasi doloremque, sunt non debitis provident.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex consequatur explicabo soluta repellendus neque quisquam vel fugiat rerum. Placeat dolorum modi perspiciatis quibusdam hic tempore ipsum incidunt dignissimos quasi deserunt.
            </p>
            <br />
            <div class="text-center">
                <button>Click Me</button>
                <button>Go Back to Home Page</button>
                <br />
                <br />
                <a>Click Me</a>
                <br />
                <br />
                <a>CLICK ME</a>
            </div>
        </div>
    </body>
</html>
