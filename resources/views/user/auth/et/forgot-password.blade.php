<x-master-layout>
    <div class="container auth-form-container">
        <div class="row justify-content-center form-row">
            <div class="col-12 col-md-6">

                <div class="card p-1 p-md-3">
                    <div class="card-body">
                        <div class="mb-4 text-sm form-label">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control " id="user_email" placeholder="Your Email" required autofocus>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="d-flex align-items-center justify-content-end mt-4">
                                <button class="ms-3 btn btn-primary">
                                    {{ __('Continue') }}
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>