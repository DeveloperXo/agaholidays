<x-master-layout>
    <div class="container auth-form-container">
        <div class="row justify-content-center form-row">
            <div class="col-12 col-md-6">
                <div class="card p-1 p-md-3">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control " id="user_name" placeholder="Your Name" required autofocus autocomplete="name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control " id="user_email" placeholder="Your Email" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="user_password" placeholder="Your New Password" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <label for="user_password_confirm" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="user_password_confirm" placeholder="Confirm Password" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                <a class="text-muted" href="{{ route('login') }}">
                                    {{ __("Have an account?") }}
                                </a>

                                <button class="ms-3 btn btn-primary">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>