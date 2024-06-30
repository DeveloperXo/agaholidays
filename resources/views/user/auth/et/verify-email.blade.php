<x-master-layout>
    <div class="container auth-form-container">
        <div class="row justify-content-center form-row">
            <div class="col-12 col-md-6">

                <div class="card p-1 p-md-3">
                    <div class="card-body">

                        <div class="mb-4 text-sm form-label">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm form-label">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <form action="{{ route('verification.send') }}" method="post">
                                @csrf
    
                                <button class="btn btn-primary">
                                    {{ __('Resend Email') }}
                                </button>
                            </form>
    
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <button type="submit" class="btn text-muted">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>