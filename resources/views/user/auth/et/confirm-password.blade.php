<x-master-layout>
    <div class="container auth-form-container">
        <div class="row justify-content-center form-row">
            <div class="col-12 col-md-6">

                <div class="card p-1 p-md-3">
                    <div class="card-body">
                        <div class="mb-4 text-sm form-label">
                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                        </div>
                        
                        <form action="{{ route('password.confirm') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="user_password" required autocomplete="current-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
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