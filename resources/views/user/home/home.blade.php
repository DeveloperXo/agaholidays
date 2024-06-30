<x-master-layout :meta="$meta">
    @vite(['resources/css/home.css'])
    
    <!-- Lead Section -->
    @include('user.home.lead')

    <!-- Packages -->
    @include('user.home.packages')

    <!-- Destinations -->
    @include('user.home.destinations')

    <!-- Features -->
    @include('user.home.features')

    <!-- Blogs -->
    @include('user.home.blogs')

    <!-- Newsletter --> 
    @include('components.newsletter')
</x-master-layout>