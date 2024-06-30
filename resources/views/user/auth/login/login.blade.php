<x-master-layout>
    <div class="container auth-form-container">
        <div class="row justify-content-center form-row">
            <div class="col-12 col-md-6">

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="card p-1 p-md-3">
                    <div class="card-body">
                        
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control " id="user_email" placeholder="Your Email" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="user_password" placeholder="Your Password" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="block mb-3">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <label for="remember_me" class="ms-2 form-label">Remember Me</label>
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                <a class="text-muted" href="{{ route('register') }}">
                                    {{ __("Don't have an account?") }}
                                </a> &nbsp;&nbsp;
                                @if (Route::has('password.request'))
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <button class="ms-3 btn btn-primary">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>