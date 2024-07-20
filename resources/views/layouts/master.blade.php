<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@if(isset($meta->page_title) && request()->route()->getName() !== 'user_home'){{ $meta->page_title . ' - ' .config('app.name', 'AGA Holidays') }}@elseif(isset($meta->page_title)){{ $meta->page_title }}@else{{ config('app.name', 'AGA Holidays') }}@endif</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rosarivo:ital@0;1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <!-- Includes -->
        <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.carousel.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.theme.default.min.css') }}" type="text/css" />

        
        <!-- CSS -->
        @vite(['resources/sass/app.scss'])
        
        @vite(['resources/css/defaults.css', 'resources/css/navigation.css', 'resources/css/footer.css'])
        @vite(['resources/css/auth.css'])

        <!-- JQuery -->
        <script src="{{ asset('assets/admin/vendor/jquery/jquery-3.7.1.min.js') }}"></script>

        {{--<!-- Spotlight Image Gallery -->--}}
        <link rel="stylesheet" href="{{ asset('assets/spotlight/css/spotlight.min.css') }}" type="text/css" />
        <script src="{{ asset('assets/spotlight/js/spotlight.min.js') }}"></script>
        
        <!-- Google Maps -->
        <script>
            (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
            ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly"});
        </script>

    </head>

    <body>
        @if (auth()->check() && auth()->user()->role === 'admin') 
            @include('components.admin-nav')
        @endif

        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>

        @include('layouts.footer')

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/js/user.js'])

        <script src="{{ asset('assets/owl-carousel/owl.carousel.min.js') }}"></script>

    </body>
</html>