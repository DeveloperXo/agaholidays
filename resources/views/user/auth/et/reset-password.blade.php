<x-master-layout>
    <div class="container auth-form-container">
        <div class="row justify-content-center form-row">
            <div class="col-12 col-md-6">

                <div class="card p-1 p-md-3">
                    <div class="card-body">

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        
                        <form action="{{ route('password.store') }}" method="post">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control " id="user_email" value="{{ old('email', $request->email) }}" placeholder="Your Email" required autofocus>
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
                                <button class="ms-3 btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>