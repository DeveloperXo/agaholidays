<x-master-layout>
    {{-- Not in use! --}}
    <div class="py-12">
        <div class="col-12 col-md-10 mx-auto mt-3">
            <div class="card my-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg">
                    {{ __('Dashboard') }}
                </h2>
                <div class="mt-1 text-p mb-4">
                    {{ __("You're logged in!") }}
                </div>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>

</x-master-layout>
