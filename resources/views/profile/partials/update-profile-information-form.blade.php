<section>
    <header>
        <h2 class="text-lg">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-p">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="col-12 col-md-7">
            <label for="name" class="form-label mb-0">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control rounded-md mt-2" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="col-12 col-md-7">
            <label for="email" class="form-label mb-0 mt-3">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control rounded-md mt-2" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-p">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-primary">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-p text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center column-gap-4 mt-3">
            <button class="btn btn-primary">{{ __('Save') }}</button>
        </div>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-p text-success mt-2"
                >{{ __('Profile Saved.') }}</p>
            @endif
    </form>
</section>
