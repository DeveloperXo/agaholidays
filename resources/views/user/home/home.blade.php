<x-master-layout :meta="$meta">
    @vite(['resources/css/home.css'])
    
    <!-- Lead Section -->
    @include('user.home.lead')

    <!-- Packages -->
    @isset($packages)
        @include('user.home.packages')
    @endisset

    <!-- Destinations -->
    @isset($destinations)
        @include('user.home.destinations')
    @endisset

    <!-- Features -->
    @include('user.home.features')

    <!-- Blogs -->
    @isset($blogs)
        @include('user.home.blogs')
    @endisset

    <!-- Newsletter --> 
    @include('components.newsletter')
</x-master-layout>